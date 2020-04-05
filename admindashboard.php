<?php
    session_start();
    if(!isset($_SESSION['username']))
    {
        header("location:index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>
<body>
    <form method="POST">
        <input type="submit" name="logout" value="Logout">
    </form>
    <?php
        if(isset($_POST['logout'])){
            session_unset();
            session_destroy();
            header("location:index.php");
        }
    ?>
    <h1>Hi admin</h1>
    
</body>
</html>