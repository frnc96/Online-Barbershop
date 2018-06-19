<?php 
  require_once('connect.php'); 
  $_SESSION["query"] = "SELECT * FROM salons";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Barber Saloon Main Page</title>
  <link rel="icon" href="http://allisfree.al/barber/images/favicon.png">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Fredoka+One" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Quattrocento+Sans" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Kalam" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Racing+Sans+One" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <link href="css/about.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  
  .title{
      font-family: 'Lato', sans-serif;
  }

    .topnav{
      font-family: 'Racing Sans One', cursive;
    }

    strong {
      font-family: 'Fredoka One', cursive;font-size: 15px;
    }

    .desc, body, #search{
      font-family: 'Quicksand', sans-serif;
    }

    i{
      font-family: 'Quattrocento Sans', sans-serif;
    }

    #button{
      font-family: 'Kalam', cursive;
      font-size: 15px;
    }

    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 700px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;} 
    }

    .checked {
      color: orange;
    }
  </style>
</head>
<body>

<!-- Navigation bar -->
<div class="topnav" style="background:#fed330">
<a href="http://allisfree.al/barber/mainPage.php" class="resize" style="
    padding-top: 0px;
    padding-right: 0px;
    padding-left: 0px;
    padding-bottom: 0px;"> <img src="http://allisfree.al/barber/images/logo.png" style="margin-right: 20px;
  padding-right: -100;
  float:left;width: 60px;
  border-bottom-width: 10px;
  margin-bottom: 0px;
  padding-left: 15px;
  height: 50px;"></a>
    <?php 
    if(isset($_SESSION["userEmail"])){
        echo '<a href="http://allisfree.al/barber/mainPage.php">'.$_SESSION["userName"].'\'s Home</a>';
    }else{
        echo '<a href="http://allisfree.al/barber/mainPage.php">Home</a>';
    }
    echo '<a href="http://allisfree.al/barber/reservationsPage.php">Reservations</a>';
    echo '<a class="active" href="http://allisfree.al/barber/aboutPage.php">About</a>';
    if(isset($_SESSION["userEmail"])){
        echo '<a href="http://allisfree.al/barber/index.php">LogOut</a>';
    }else{
        echo '<a href="http://allisfree.al/barber/index.php">LogIn/SignUp</a>';
    }
    ?>
  <div class="search-container">
    <form method="get">
    <input id="search" type="text" style="border-radius: 5px; padding-left: 6px; margin-top: 8px; width: 212px;" placeholder="Search..." name="search">
      <button id="searchBtn" type="submit" style="border-radius: 5px; margin-right: 20px; padding-right: 10px;"><i class="fa fa-search"></i></button>
    </form>
  </div>
</div>
<div id="whole" class="container-fluid text-center">    
  <div class="row content">



    <!-- Middle part of the page -->
    <div class="col-sm-8 text-left"> 
    
    <div class="wrapper row2">
  <div id="container" class="clear">
    <!-- ####################################################################################################### -->
    <!-- ####################################################################################################### -->
    <!-- ####################################################################################################### -->
    <!-- ####################################################################################################### -->
    <div id="about-us" class="clear">
      <div class="title">
        <!-- ####################################################################################################### -->
        <section id="about-intro" class="clear">
          <blockquote>
            <p><span>&ldquo;</span> Barbershop provide the highest quality of service. We have everything to guarantee a best results ever:
Modern equipment
Professional staff
Exclusive attention to details
User Friendly</p>
          </blockquote>
          <p class="right">&quot;Vivamus accumsan / Company Director&quot;</p>
          <div class="panorama"><img class="imgholder" src="images/demo/695x250.gif" alt=""></div>
          <p>Once you step in, your needs is our care. Waste no more time searching a barber shop in Albania , visit our website and let us care about your look.</p>
          <p>Whether you want to look great for you wedding or simply impress them at your next interview, we guarantee a detailed approach to each client paid off.</p>
        </section>
        <!-- ####################################################################################################### -->
        <section id="skillset" class="clear">
          <h1>Indonectetus facilis</h1>
          <article class="clear">
            <div class="fl_left"><img src="images/demo/125x125.gif" alt=""></div>
            <div class="fl_right">
              <h2>Indonectetus facilis</h2>
              <p>Lorem ipsum dolor sit amet, consectetaur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
              <p><a href="#">Read More &raquo;</a></p>
            </div>
          </article>
          <article class="clear">
            <div class="fl_left"><img src="images/demo/125x125.gif" alt=""></div>
            <div class="fl_right">
              <h2>Indonectetus facilis</h2>
              <p>Lorem ipsum dolor sit amet, consectetaur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
              <p><a href="#">Read More &raquo;</a></p>
            </div>
          </article>
          <article class="clear">
            <div class="fl_left"><img src="images/demo/125x125.gif" alt=""></div>
            <div class="fl_right">
              <h2>Indonectetus facilis</h2>
              <p>Lorem ipsum dolor sit amet, consectetaur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
              <p><a href="#">Read More &raquo;</a></p>
            </div>
          </article>
        </section>
        <!-- ####################################################################################################### -->
      </div>
      <!-- ####################################################################################################### -->
      <section id="team" class="one_quarter">
        <h2>The Team</h2>
        <ul>
          <li>
            <figure><img src="http://allisfree.al/barber/images/frnc.png" alt="" style="width: 80px; height: 80px;">
              <figcaption>
                <p class="team_name">Frencis Balla</p>
                <p class="team_title">Developer</p>
              </figcaption>
            </figure>
          </li>
          <li>
            <figure><img src="http://allisfree.al/barber/images/kevi.png" alt="" style="width: 80px; height: 80px;">
              <figcaption>
                <p class="team_name">Kevi Hysi</p>
                <p class="team_title">Web Designer</p>
              </figcaption>
            </figure>
          </li>
    
      </section>
      <!-- ####################################################################################################### -->
    </div>
    <!-- ####################################################################################################### -->
    <!-- ####################################################################################################### -->
    <!-- ####################################################################################################### -->
    <!-- ####################################################################################################### -->
  </div>
</div>
    </div>


  </div>
</div>



<script>

</script>

</body>
</html>
