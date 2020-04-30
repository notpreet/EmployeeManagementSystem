<?php
    include 'dbcon.php';
    session_start();
    if(!isset($_SESSION['username']))
    {
        header("location:./index.php");
    }
    if($_SESSION['admin']==0 )
    {
        session_unset();
        session_destroy();
        header("location:./index.php");
    }
?>
<?php
        if(isset($_POST['logout'])){
            session_unset();
            session_destroy();
            header("location:./index.php");
        }
?>
<?php
    $abc="select * from login where emp_id='".$_SESSION['username']."'";
    $re=$conn->query($abc) or die($conn->error);
    $usr=$re->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manage Employees</title>

    <!-- Bootstrap core CSS -->

    <script src="bootstrap/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    
    <style>
        .card-wrapper {
            width: 100%;
            display: flex;
            justify-content: space-evenly;
            align-items: center;
            box-shadow: 1px 1px 15px 5px grey;
            border-radius: 20px;
            padding: 15px;
            background-color: whitesmoke;
            margin: 15px auto;
            transition: all 0.3s ease-in-out;
        }

        .card-wrapper:hover {
            cursor: pointer;
            transform: translateY(-10px);
        }

        .container#blur-wrapper.active {
            filter: blur(20px);
            pointer-events: none;
            user-select: none;
        }

        .img-profile {
            height: 100px;
            width: 100px;
        }

        .modal {
            position: inline;
            top: 150px;
            right: 350px;
            bottom: 0;
            left: 0;
            overflow: hidden;
        }

        @media(max-width: 789px) {
            .card-wrapper {
                margin: 10px 0px;
            }

            .img-profile {
                display: none !important;
            }

            .info-wrapper h2 {
                font-size: 20px;
            }
        }
    </style>

    <script>
        function showDet(eid){
            var xhttp;
            xhttp=new XMLHttpRequest();
            xhttp.onreadystatechange=function(){
                if(this.readyState==4 && this.status==200){
                    document.getElementById("modalbody").innerHTML=this.responseText;
                }
            };
            xhttp.open("GET","getempdet.php?q="+eid,true);
            xhttp.send();
        }
        function delDet(eid)
        {
            var xhttp;
            xhttp=new XMLHttpRequest();
            xhttp.onreadystatechange=function()
            {
                if(this.readyState==4 && this.status==200)
                {
                    console.log(this.responseText);
                }
            }
            xhttp.open("GET","delemp.php?q="+eid,true);
            xhttp.send();
            location.reload();
        }
    </script>
</head>

<body>

    <nav class="navbar navbar-expand-md navbar-light bg-white  shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="./admindashboard.php"><?php echo $usr['username']; ?></a>
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
                        <a href="./manageemployee.php" class="active nav-link">Manage Employee</a>
                    </li>
                    <li class="nav-item  mr-4">
                        <form method="POST">
                            <button class="nav-link" name="logout"
                                style="border:hidden; background-color:white;">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <?php
                $sql1="select dept_id from employee where emp_id='".$_SESSION['username']."'";
                $res1=$conn->query($sql1) or die($conn->error);
                $ro=$res1->fetch_assoc();
                $dept=$ro['dept_id'];
                $sql= "select * from employee where is_hr='0' and dept_id=".$dept;
                $result=$conn->query($sql) or die($conn->error);
                if($result->num_rows>0)
                {
                    while($row=$result->fetch_assoc())
                    {
            ?>
            <div class="col-md-6 col-sm-12">
                <div class="card-wrapper">
                    <div class="img-wrapper">
                        <img class="rounded-circle img-profile" height="100" width="100" src=<?php echo $row['profile_pic']; ?> alt="img">
                    </div>
                    <div class="info-wrapper">
                        <h2><?php echo $row['first_name'].' '.$row['last_name'] ?></h2>
                        <h6><?php echo $row['email']?></h6>
                        <hr>
                        <h6><?php echo $row['post']?></h6>
                        <h6><?php echo $row['phone']?></h6>
                    </div>
                    <div class="button-wrappper">
                        <!-- <form class="show_details"> -->
                        <button class="btn btn-primary viewdet" onclick="showDet(this.value)" data-toggle="modal" data-target="#myModal"
                            value=<?php echo "'".$row['emp_id']."'"; ?>>View Details</button>
                        <!-- </form> -->
                        <!-- <form class="delete_acc"> -->
                            <br>
                            <button class="btn btn-danger" onclick="delDet(this.value)" type="submit" value=<?php echo "'".$row['emp_id']."'"; ?>>Delete Account</button>
                        <!-- </form> -->
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" tabindex="-1" id="myModal">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h4 class="modal-title">Employee Details</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <div class="modal-body" id="modalbody">
                                Modal body..
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                    }
                }
                else
                {
            ?>
                <div class="w-100 d-flex justify-content-center align-items-center p-5 m-5">
                        <h4>No Employees To Manage</h4>
                </div>
            <?php
                }
            ?>
        </div>
    </div>
</body>

</html>