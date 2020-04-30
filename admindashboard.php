<?php
    include 'dbcon.php';
    session_start();
    if(!isset($_SESSION['username']))
    {
        header("Location:. /index.php");
    }
    if($_SESSION['admin']==0)
    {
        session_unset();
        session_destroy();
        header("Location: ./index.php");
    }
?>
<?php
        if(isset($_POST['logout'])){
            session_unset();
            session_destroy();
            header("Location: ./index.php");
        }
?>
<?php
    $sql="select * from interview";
    $result=$conn->query($sql) or die($conn->error);
    $row=$result->fetch_assoc();
    $sql1="select * from employee where emp_id='".$_SESSION['username']."'";
    $result1=$conn->query($sql1) or die($conn->error);
    $row1=$result1->fetch_assoc();
    $curdep=$row1['dept_id'];
    $sql2="select * from login where emp_id='".$_SESSION['username']."'";
    $result2=$conn->query($sql2) or die($conn->error);
    $row2=$result2->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>

    <!-- Bootstrap core CSS -->

    <script src="bootstrap/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <style>
        /* .card-deck {
            height: 250px;
            width: auto;
        } */
    </style>
    
</head>

<body>

    <nav class="navbar navbar-expand-md navbar-light bg-white  shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="./admindashboard.php"><?php echo $row2['username'];?></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsDefault">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarsDefault">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item mr-4">
                        <a href="./employeeprofile.php" class="nav-link">Profile</a>
                    </li>
                    <li class="nav-item mr-4">
                        <a href="./signup.php" class="nav-link">Register</a>
                    </li>
                    <li class="nav-item mr-4">
                        <a href="./leaveapplications.php" class="nav-link">Leave Applications</a>
                    </li>
                    <li class="nav-item mr-4">
                        <a href="./manageemployee.php" class="nav-link">Manage Employee</a>
                    </li>
                    <li class="nav-item  mr-4">
                        <form method="POST">
                            <button class="nav-link" name="logout" style="border:hidden; background-color:white;">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="py-4" id="dash">
        <div class="card-wrapper card-1" id="card-1">
            <h4>Upcoming interviews</h4>
            <div class="card-deck">
                <p id="disp" style="display:none">You are all caught up with interviews</p>
                <div class="card card1">
                    <?php
                        if($row==false)
                        {
                            echo "<script>
                                var elem=document.getElementsByClassName('card card1');
                                for(var i=0;i<elem.length;i++){
                                    elem[i].style.display='none';
                                }
                                document.getElementById('disp').style.display='block';
                            </script>";
                        }
                    ?>
                    <div class="card-body">
                        <img class="rounded-circle" style="height: 120px; width: 120px; float: left;" src=""
                            data-holder-rendered="true">
                        <h4 class="card-title card1"><?php echo $row['name']; ?></h4>
                        <p class="card-text"><?php echo $row['post']; ?></p>
                        <p class="card-text"><?php echo $row['mob_number']; ?></p>
                        <h5><?php echo $row['city']; ?>,<?php echo $row['state']; ?></h5>
                            <h5><?php echo $row['date']; ?></h5>
                            
                    </div>
                </div>
                <div class="card card2">
                    <?php
                        $row=$result->fetch_assoc();
                        if($row==false)
                        {
                            echo "<script>

                                var elem=document.getElementsByClassName('card card2');
                                for(var i=0;i<elem.length;i++){
                                    elem[i].style.display='none';
                                }
                            </script>";
                        }
                    ?>
                    <div class="card-body">
                        <img class="rounded-circle" style="height: 120px; width: 120px; float: left;" src="images/3.jpg"
                            data-holder-rendered="true">
                        <h4 class="card-title card1"><?php echo $row['name']; ?></h4>
                        <p class="card-text"><?php echo $row['post']; ?></p>
                        <p class="card-text"><?php echo $row['mob_number']; ?></p>
                        <h5><?php echo $row['city']; ?>,<?php echo $row['state']; ?></h5>
                            <h5><?php echo $row['date']; ?></h5>
                            
                    </div>
                </div>
                <div class="card card3">
                    <?php
                        $row=$result->fetch_assoc();
                        if($row==false)
                        {
                            echo "<script>
                                var elem=document.getElementsByClassName('card card3');
                                for(var i=0;i<elem.length;i++){
                                    elem[i].style.display='none';
                                }
                            </script>";
                        }
                    ?>
                    <div class="card-body">
                        <img class="rounded-circle" style="height: 120px; width: 120px; float: left;" src="images/3.jpg"
                            data-holder-rendered="true">
                        <h4 class="card-title card1"><?php echo $row['name']; ?></h4>
                        <p class="card-text"><?php echo $row['post']; ?></p>
                        <p class="card-text"><?php echo $row['mob_number']; ?></p>
                        <h5><?php echo $row['city']; ?>,<?php echo $row['state']; ?></h5>
                            <h5><?php echo $row['date']; ?></h5>    
                    </div>
                </div>
            </div>
        </div>

        <?php
            $sql1="select employee.first_name,employee.last_name,employee.post,employee.profile_pic,leavedet.dt_from,leavedet.dt_to,leavedet.status from employee,leavedet where employee.emp_id=leavedet.emp_id";
            $result=$conn->query($sql1) or die($conn->error);
            $row=$result->fetch_assoc();
        ?>
        <div class="card-wrapper card-1" id="card-1">
            <h4>Employee's Leaves</h4>
            <p id="disp1" style="display:none">You are all caught up with leave requests</p>
            <div class="card-deck">
                <div class="card">
                    <?php
                        if($row==false)
                        {
                            echo "<script>
                                var elem=document.getElementsByClassName('card-wrapper card-1');
                                for(var i=0;i<elem.length;i++)
                                {
                                    elem[i].style.display='none';
                                }
                                document.getElementById('disp1').style.display='block';
                            </script>";
                        }
                    ?>
                    <div class="card-body">
                            <img class="rounded-circle" style="height: 120px; width: 120px; float: left;" src=<?php echo $row['profile_pic']; ?>
                                data-holder-rendered="true" alt="img">
                            <h5 class="card-body"><?php echo $row['first_name'] .' '. $row['last_name']; ?></h5>
                            <p><?php echo $row['post']; ?></p>
                            <p><?php echo $row['status']; ?></p>
                            <br>
                            <p>From:<?php echo $row['dt_from']; ?></p>
                            <p>To:<?php echo $row['dt_to']; ?></p>
                            <p>Total days:<?php 
                                $date1=date_create($row['dt_from']);
                                $date2=date_create($row['dt_to']);
                                echo $date1->diff($date2)->format("%d");
                            ?></p>
                    </div>
                </div>
                <div class="card cardle-2">
                    <?php
                        $row=$result->fetch_assoc();
                        if($row==false)
                        {
                            echo "<script>
                                var elem=document.getElementsByClassName('card cardle-2');
                                for(var i=0;i<elem.length;i++)
                                {
                                    elem[i].style.display='none';
                                }
                            </script>";
                        }
                    ?>
                    <div class="card-body">
                            <img class="rounded-circle" style="height: 120px; width: 120px; float: left;" src=<?php echo $row['profile_pic']; ?>
                                data-holder-rendered="true" alt="img">
                            <h5 class="card-body"><?php echo $row['first_name'] .' '. $row['last_name']; ?></h5>
                            <p><?php echo $row['post']; ?></p>
                            <p><?php echo $row['status']; ?></p>
                            <br>
                            <p>From:<?php echo $row['dt_from']; ?></p>
                            <p>To:<?php echo $row['dt_to']; ?></p>
                            <p>Total days:<?php 
                                $date1=date_create($row['dt_from']);
                                $date2=date_create($row['dt_to']);
                                echo $date1->diff($date2)->format("%d");
                            ?></p>
                    </div>
                </div>
                <div class="card cardle-3">
                    <?php
                        $row=$result->fetch_assoc();
                        if($row==false)
                        {
                            echo "<script>
                                var elem=document.getElementsByClassName('card cardle-3');
                                for(var i=0;i<elem.length;i++)
                                {
                                    elem[i].style.display='none';
                                }
                            </script>";
                        }
                    ?>
                    <div class="card-body">
                            <img class="rounded-circle" style="height: 120px; width: 120px; float: left;" src=<?php echo $row['profile_pic']; ?>
                                data-holder-rendered="true" alt="img">
                            <h5 class="card-body"><?php echo $row['first_name'] .' '. $row['last_name']; ?></h5>
                            <p><?php echo $row['post']; ?></p>
                            <p><?php echo $row['status']; ?></p>
                            <br>
                            <p>From:<?php echo $row['dt_from']; ?></p>
                            <p>To:<?php echo $row['dt_to']; ?></p>
                            <button class="btn btn-primary">Accept</button>
                            <button class="btn btn-primary">Reject</button>
                    </div>
                </div>
                <div class="card cardle-4">
                    <?php
                        $row=$result->fetch_assoc();
                        if($row==false)
                        {
                            echo "<script>
                                var elem=document.getElementsByClassName('card cardle-4');
                                for(var i=0;i<elem.length;i++)
                                {
                                    elem[i].style.display='none';
                                }
                            </script>";
                        }
                    ?>
                    <div class="card-body">
                            <img class="rounded-circle" style="height: 120px; width: 120px; float: left;" src=<?php echo $row['profile_pic']; ?>
                                data-holder-rendered="true" alt="img">
                            <h5 class="card-body"><?php echo $row['first_name'] .' '. $row['last_name']; ?></h5>
                            <p><?php echo $row['post']; ?></p>
                            <p><?php echo $row['status']; ?></p>
                            <br>
                            <p>From:<?php echo $row['dt_from']; ?></p>
                            <p>To:<?php echo $row['dt_to']; ?></p>
                            <button class="btn btn-primary">Accept</button>
                            <button class="btn btn-primary">Reject</button>
                    </div>
                </div>
            </div>
        </div>
    </main>

</body>

</html>