<?php
    session_start();
    include 'dbcon.php';
    if(!isset($_SESSION['username']))
    {
        header("location:index.php");
    }
    if($_SESSION['admin']==0)
    {
        header("location:index.php");
    }
?>
<?php
        if(isset($_POST['logout'])){
            session_unset();
            session_destroy();
            header("location:index.php");
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
            top: 250px;
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
        function accept(leaveid){
            var xhttp;
            xhttp=new XMLHttpRequest();
            xhttp.onreadystatechange=function(){
                if(this.readyState==4 && this.status==200){
                        location.reload();
                }

            };
            xhttp.open("GET","acceptleave.php?q="+leaveid,true);
            xhttp.send();
        }
        function reject(leaveeid){
            swal.fire({
                title: "Are you sure?",
                text: "You will reject this employee's leave !",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete)=>{
                if(willDelete){
                    var xhttp;
                    xhttp=new XMLHttpRequest();
                    xhttp.onreadystatechange=function(){
                    if(this.readyState==4 && this.status==200){
                        Swal.fire("Poof! Leave has been declined", {
                        icon: "success",
                        });
                        location.reload();
                    }
                };
                xhttp.open("GET","rejectleave.php?q="+leaveeid,true);
                xhttp.send();
                }
            });
        }
    </script>
</head>

<body>

    <nav class="navbar navbar-expand-md navbar-light bg-white  shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="admindashboard.php"><?php echo $usr['username'];?></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsDefault">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarsDefault">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item mr-4">
                        <a href="employeeprofile.php" class="nav-link">Profile</a>
                    </li>
                    <li class="nav-item mr-4">
                        <a href="signup.php" class="nav-link">Register</a>
                    </li>
                    <li class="nav-item active mr-4">
                        <a href="" class="nav-link">Leave Applications</a>
                    </li>
                    <li class="nav-item mr-4">
                        <a href="manageemployee.php" class="nav-link">Manage Employee</a>
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
                $sql="select employee.first_name,employee.last_name,employee.post,employee.profile_pic,leavedet.pending,leavedet.leave_id,leavedet.dt_from,leavedet.dt_to,leavedet.status,leavedet.reason from employee,leavedet where employee.emp_id=leavedet.emp_id";
                $result=$conn->query($sql) or die($conn->error);
                if($result->num_rows>0)
                {
                    while($row=$result->fetch_assoc())
                    {
            ?>
            <div class="col-md-6 col-sm-12">
                <div class="card-wrapper">
                    <div class="img-wrapper">
                        <img class="rounded-circle img-profile" height="100" width="100" src=<?php echo $row['profile_pic']; ?> alt>
                    </div>
                    <div class="info-wrapper">
                        <h2><?php echo $row['first_name'].' '.$row['last_name'] ?></h2>
                        <h6><?php echo $row['post']?></h6>
                        <hr>
                        <h6><?php echo $row['dt_from']?></h6>
                        <h6><?php echo $row['dt_to']?></h6>
                        <hr>
                        <p><?php echo $row['reason']?></p>
                    </div>
                    <?php
                        if($row['pending']=='1')
                        {
                    ?>
                    <div class="button-wrappper" class="buts">
                        <button class="btn btn-primary viewdet" onclick="accept(this.value )" value=<?php echo "'".$row['leave_id']."'"; ?>>Accept</button>
                        <br>
                        <button class="btn btn-danger" onclick="reject(this.value)" type="submit" value=<?php echo "'".$row['leave_id']."'"; ?>>Reject</button>
                    </div>
                    <?php
                        }
                        else if($row['status']=='1')
                        {
                    ?>
                    <div class="button wrapper">
                        <p>This leave has been accepted</p>
                    </div>
                    <?php
                        }
                        else
                        {
                    ?>
                    <div class="button wrapper">
                        <p>This leave has been rejected</p>
                    </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
            <?php
                    }
                }
                else
                {
            ?>
                <div class="w-100 d-flex justify-content-center align-items-center p-5 m-5">
                        <h4>No Leaves To Manage</h4>
                </div>
            <?php
                }
            ?>
        </div>
    </div>
</body>

</html>