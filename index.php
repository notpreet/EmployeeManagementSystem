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
            <div id="loginform">
                <label for="mailID"><b>Email</b></label><br>
                <input type="email" name="mailID" id="email"><br>
                <label for="pass"><b>Password</b></label><br>
                <input type="password" name="pass" id="pass"><br>
                <input type="checkbox" name="remember" id="remem">
                <label id="remb">Remember Me</label>
                <a href="#" class="fgp">Forgot Password?</a>
                <br>
                <button id="login">Login</button>
                <br>
                <label class="haveacc">Don't have an account?<a href class="signup">Sign Up</a></label>
            </div>
        </div>
    </div>
</body>
</html>