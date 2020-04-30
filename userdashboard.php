<?php
    include 'dbcon.php';
    session_start();
    if(!isset($_SESSION['username']))
    {
        header("location:index.php");
    }
    if($_SESSION['admin']==1)
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
    $que="select * from employee where emp_id='".$_SESSION['username']."'";
    $result=$conn->query($que) or die($conn->error);
    $row=$result->fetch_assoc();
    if(count($row)==0){
        die("invalid employee id");
    }
    $result1=$conn->query("select * from login where login.emp_id='".$_SESSION['username']."'") or die($conn->error);
    $row1=$result1->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Staff</title>

    <!-- Bootstrap core CSS -->

    <script src="bootstrap/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
    <script src="bootstrap/js/bootstrap.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-light bg-white  shadow-sm">
        <div class="container">
            <a class="navbar-brand active" href="userdashboard.php"><?php echo $row1['username']; ?></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsDefault">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarsDefault">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item mr-4">
                        <a href="employeeprofile.php" class="nav-link">Profile</a>
                    </li>
                    <li class="nav-item mr-4">
                        <a href="applyforleave.php" class="nav-link">Apply for Leave</a>
                    </li>
                    <li class="nav-item active mr-4">
                        <form method="POST">
                            <button class="nav-link" name="logout"
                                style="border:hidden; background-color:white;">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">

    </main>

</body>

</html>