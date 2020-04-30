<?php
    session_start();
    if(!isset($_SESSION['bossname']))
    {
        session_unset();
        session_destroy();
        header("Location:. /index.php");
    }
    if(isset($_POST['logout'])){
        session_unset();
        session_destroy();
        header("Location: ./index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Main Dashboard</title>

    <!-- Bootstrap core CSS -->

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
    <script src="bootstrap/js/bootstrap.min.js"></script>
    
</head>

<body>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-md navbar-light bg-white  shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="bossdashboard.php">Welcome CEO</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsDefault">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarsDefault">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item mr-4">
                        <a href="./addnewHR.php" class="nav-link">Manage HR</a>
                    </li>
                    <li class="nav-item mr-4">
                        <a href="./manageDept.php" class="nav-link">Manage Departments</a>
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
</body>

</html>