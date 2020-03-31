<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="google-signin-client_id" content="cybernetic-tide-272617">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="assets/index.css" />
    <script src="https://apis.google.com/js/platform.js" async defer></script>
</head>
<body>
    <div id="logincontainer">
        <div id="partone">
            <p id="heading">Welcome</p>
            <img src="images/loginEmployee.png">
        </div>
        <div id="parttwo">
            <form id="loginform" method="POST">
                <label for="mailID"><b>Email</b></label><br>
                <input type="email" name="mailID" id="email" required><br>
                <label for="pass"><b>Password</b></label><br>
                <input type="password" name="pass" id="pass" require><br>
                <input type="checkbox" name="remember" id="remem">
                <label id="remb">Remember Me</label>
                <a href="#" class="fgp">Forgot Password?</a>
                <br>
                <input type="submit" id="login" name="login" value="Login">
                <br>
                <label class="haveacc">Don't have an account?<a href class="signup">Sign Up</a></label>
            </form>
        </div>
    </div>
    <?php
        $conn = new mysqli("localhost","root","","employeedb");
        if(isset($_POST['login'])){
            $email = $_POST['mailID'];
            $pass = $_POST['pass'];
            $conn = new mysqli("localhost","root","","employeedb");
            if(mysqli_connect_error()){
                die("Database connection failed: " . mysqli_connect_error());
            }
            $sql = "SELECT * from login where name='".$email."'";
            $result = $conn->query($sql) or die($conn->error);
            $row = $result->fetch_assoc();
            if($pass==$row['password'])
            {
                if($row['isadmin'])
                    header("Location: admindashboard.html");
                else
                    header("Location: userdashboard.html");
            }
            else{
                echo "<script>alert('Wrong password')</script>";
            }
            
        }
    ?>
</body>
</html>