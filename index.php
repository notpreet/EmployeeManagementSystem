<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <!-- Bootstrap core CSS -->

    <script src="bootstrap/jquery-3.3.1.slim.min.js"></script>
    <script src="bootstrap/popper.min.js"></script>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
    <script src="bootstrap/js/bootstrap.min.js"></script>
    
    <!--on scroll -->


    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    
    <style>
      #main{
        height: 100vh;
        width : 100%;
        overflow-x: hidden;
      }
      #about{
        height: 100vh;
        width: 100%;
      }
      #team{
        height: 100vh;
        width: 100%;
      }
      #contact{
        height: 100vh;
        width: 100%;
      }


      /* media queries*/

      @media only screen and (max-width: 1199px){
          .caraousel-caption h3{
            font-size: 32px;;
          }
          .caraousel-caption p{
            font-size: 18px;;
          }
      }
      @media only screen and (max-width: 991px){
          .caraousel-caption p{
            display: none;
          }
      }
      @media only screen and (max-width: 767px){
          .caraousel-caption h3{
            font-size: 24px;;
          }
          .caraousel-caption p{
            padding-bottom: 6%;;
          }
      }
     /* @media only screen and (max-width: 575px){
          #aboutcarousel{
            display: none;
          }
          #about{
            margin-top: 80px;
          }
      }*/


    </style>
</head>
<body data-spy="scroll" data-target="#navbarsExampleDefault">

  <!--Code for navbar-->



  <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">Emploo</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item  mr-4">
                    <a class="nav-link" href="#about">About</a>
                </li>
                <li class="nav-item  mr-4">
                    <a class="nav-link" href="#team">Team</a>
                </li>
                <li class="nav-item  mr-4">
                    <a class="nav-link" href="#contact">Contact</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
              <li class="nav-item mr-4">
                <a class="nav-link" href="login.php">Login</a>
              </li>
            </ul>
        </div>
    </div>    
  </nav>

  <!--Here is code for the carousel-->
  <section id="main">
      <div id="aboutcarousel" class="carousel slide" data-ride="carousel">

        <ol class="carousel-indicators">

          <li  data-target="#aboutcarousel" data-slide-to="0" class="active"></li>
          <li  data-target="#aboutcarousel" data-slide-to="1"></li>
          <li  data-target="#aboutcarousel" data-slide-to="2"></li>

        </ol>
        
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block " src="images/1.jpg" alt="First">
            <div class="carousel-caption d-md-block">
              <h3>Lorem</h3>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum eveniet fugiat vel odio? Veritatis in, blanditiis cum voluptate tenetur voluptatem quidem totam est ipsam odit non assumenda mollitia quam voluptas!</p>
            </div>
          </div>
          <div class="carousel-item">
            <img class="d-block " src="images/3.jpg" alt="second">
            <div class="carousel-caption d-md-block">
              <h3>Lorem</h3>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum eveniet fugiat vel odio? Veritatis in, blanditiis cum voluptate tenetur voluptatem quidem totam est ipsam odit non assumenda mollitia quam voluptas!</p>
            </div>
          </div>

          <div class="carousel-item">
            <img class="d-block " src="images/14.jpg" alt="third">
            <div class="carousel-caption d-md-block">
              <h3>Lorem</h3>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum eveniet fugiat vel odio? Veritatis in, blanditiis cum voluptate tenetur voluptatem quidem totam est ipsam odit non assumenda mollitia quam voluptas!</p>
            </div>
          </div>
        </div>

        <a class="carousel-control-prev" href="#aboutcarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>

        <a class="carousel-control-next" href="#aboutcarousel" role="button" data-slide="prev">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>

      </div>
  </section>

  <section id="about" data-aos="fade-up">
      <div id="container">
          <h3>About</h3>
          <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Cumque necessitatibus pariatur adipisci magni exercitationem velit facilis autem obcaecati quas, ipsam debitis, beatae dolorem non ipsa eligendi laborum architecto officiis mollitia!</p>

      </div>

  </section>

  <section id="team" data-aos="fade-up">
    <div id="container">
        <h3>About</h3>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Cumque necessitatibus pariatur adipisci magni exercitationem velit facilis autem obcaecati quas, ipsam debitis, beatae dolorem non ipsa eligendi laborum architecto officiis mollitia!</p>

    </div>

</section>


<section id="contact" data-aos="fade-up">
  <div id="container">
      <h3>About</h3>
      <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Cumque necessitatibus pariatur adipisci magni exercitationem velit facilis autem obcaecati quas, ipsam debitis, beatae dolorem non ipsa eligendi laborum architecto officiis mollitia!</p>

  </div>

</section>
  
  
  

  <!--on scroll gestures-->


  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>


</body>
</html> 