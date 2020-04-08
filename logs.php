<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>

    <!-- Bootstrap core CSS -->

    <script src="bootstrap/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
    <script src="bootstrap/js/bootstrap.min.js"></script>


    <style>
        body{
            height: 100vh;
            overflow-y: hidden;
        }
        #main{
            width:60%;
            margin:18%;
            border: 1px solid grey;
            box-shadow: 3px 3px 3px 3px #92a898;
            border-radius: 5px;
            
        }




        @media only screen and (max-width: 1086px){
          #logo,#hes{
              display: none;
          }
      }
    </style>


</head>
<body>

      <!-- Navbar -->

      <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <div class="container">
          <a class="navbar-brand" href="#">Emploo</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsDefault">
              <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarsDefault">
              <ul class="navbar-nav mr-auto">
                  <li class="nav-item active mr-4">
                      <a class="nav-link" href="#login">Login</a>
                  </li>
              </ul>
          </div>
       </div>    
      </nav>
      <div class="container h-50">
    <div class="container h-100" id="main">
        <div class="d-flex align-items-center justify-content-center h-100 ">
            <div class="d-flex flex-column">
                <h2 id="hes">Heading</h2>
                <img src="images/loginEmployee.png" class="img-fluid w-50" id="logo">
            </div>
            <div class="d-flex flex-column w-100">
                <div class="container">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                          </div>
                          <div class="form-group">
                            <label for="pwd">Password:</label>
                            <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
                          </div>
                          <div class="form-group form-check">
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox" name="remember"> Remember me
                            </label>
                          </div>
                          <div class="text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </div>
                          <div class="text-center">
                            <label >Don't Have an account signup?<a href="">Sign up</a></label>
                          </div>
                    </form>
                </div>
            </div>
        </div>

    </div> 
  </div>   
</body>
</html>