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
  <link href="css/style.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  
  
  
  * {box-sizing:border-box}

/* Slideshow container */
.slideshow-container {
  max-width: auto;
  position: relative;
  margin: auto;
}

/* Hide the images by default */
.mySlides {
    display: none;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  margin-top: -22px;
  padding: 16px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active, .dot:hover {
  background-color: #717171;
}

/* Fading animation */
.fadee {
  -webkit-animation-name: fadee;
  -webkit-animation-duration: 1.5s;
  animation-name: fadee;
  animation-duration: 3.5s;
}

@-webkit-keyframes fadee {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fadee {
  from {opacity: .4} 
  to {opacity: 1}
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
    .row.content {height: 1080px}
    
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
    
    .wrap{
         overflow: hidden; 
         white-space: nowrap; 
         text-overflow: ellipsis;
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
        echo '<a class="active" href="http://allisfree.al/barber/mainPage.php">'.$_SESSION["userName"].'\'s Home</a>';
    }else{
        echo '<a class="active" href="http://allisfree.al/barber/mainPage.php">Home</a>';
    }
    echo '<a href="http://allisfree.al/barber/reservationsPage.php">Reservations</a>';
    echo '<a href="http://allisfree.al/barber/aboutPage.php">About</a>';
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
<!-- Navigation bar -->

<div class="w3-content">
  
  <div class="slideshow-container">

  <!-- Full-width images with number and caption text -->
  <div class="mySlides fadee">
    <div class="numbertext">1 / 2</div>
    <img src="http://allisfree.al/barber/images/slide1.jpg" style="width:100%">
  </div>

  <div class="mySlides fadee">
    <div class="numbertext">2 / 2</div>
    <img src="http://allisfree.al/barber/images/slide2.jpg" style="width:100%">
  </div>


  <!-- Next and previous buttons -->
  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
<br>

<!-- The dots/circles -->
<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
</div>
</div>
  
<div id="whole" class="container-fluid text-center">    
  <div class="row content">

    <!-- Left part of the page -->
    <div class="col-sm-2 sidenav">
      <label for="sortList">Sort by:</label>
      <div class="dropdown" name="sortList">
        <button class="btn btn-primary dropdown-toggle btn-block wrap" type="button" data-toggle="dropdown">Select sorting method
        <span class="caret"></span></button>
        <ul class="dropdown-menu">
          <li id="abc"><a>Alphabetical</a></li>
          <li id="price"><a>Price</a></li>
          <li id="rating"><a>Rating</a></li>
        </ul>
      </div>
    </div>

    <!-- Middle part of the page -->
    <div id="mid" class="col-sm-8 text-left">
        <?php 
            $query = "SELECT * FROM salons";

            if(isset($_GET['search'])){
              $search = $_GET['search'];
              $query .= " WHERE name LIKE '%".$search."%'";
            }

            if (isset($_GET['sort'])){
              $sort = $_GET['sort'];
              switch($sort){
                case 'abc':
                  $query .= " ORDER BY name";
                  break;
                case 'rating':
                  $query .= " ORDER BY rating desc";
                  break;
                  case 'price':
                $query .= " ORDER BY name";
                  break;
              }
            }
            $rs = mysqli_query($connection, $query) or die(mysqli_error($connection));

            while($row = mysqli_fetch_array($rs)){
                echo '<div class="col-sm-3" style="padding-top: 3%;">';
                    echo '<div class="thumbnail">';
                        echo '<img src="data:image/jpeg;base64,'.base64_encode( $row["picture"] ).'" style="width: 256px; height: 144px;"';
                        echo '<p class="wrap"><strong class="wrap">'.$row['name'].'</strong><br>';
                          $rating = $row['rating'];
                          for($i = 0; $i < 5; $i++) {
                            if($rating-- <= 0)
                              echo '<span class="fa fa-star"></span>';
                            else
                              echo '<span class="fa fa-star checked"></span>';
                          }
                        echo '</p>';
                        echo '<p class="wrap"><i>Tel: '.$row["telephone"].'</i></p>';
                        echo '<p class="desc wrap">'.$row['description'].'</p>';
                        echo '<p id="salonId" style="display: none;">'.$row["id"].'</p>';
                        echo '<input id="button" type="button" class="btn btn-info btn-block" value="See more"/>';
                    echo '</div>';
                echo '</div>';
            }
        ?>
        
    </div>

    <!-- Right part of the page -->
    <div class="col-sm-2 sidenav">

      <div class="well">
        <p>ADS</p>
      </div>
      <div class="well">
        <p>ADS</p>
      </div>

    </div>

  </div>
</div>

<script>

var slideIndex = 1;
showSlides(slideIndex);
setInterval(function(){plusSlides(1);}, 5000);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}

function getCurrentUrl(){
  var fUrl = window.location.href;
  var url = fUrl.replace('http://localhost','');
  return url;
}

function setSort(srt){
  var url = getCurrentUrl();
    if(url.includes('sort')){
      if(url.includes('rating'))
        history.pushState(null, '', url.replace('rating',srt));
        //parent.location = url.replace('rating',srt);
      else if(url.includes('price'))
        history.pushState(null, '', url.replace('price',srt));
      else if(url.includes('abc'))
        history.pushState(null, '', url.replace('abc',srt));
    }
    else
        history.pushState(null, '', url+ (url.includes('?')? '&': '?')+'sort='+srt);
        //parent.location = (url.includes('?')? url+'&': '?')+'sort='+srt;
}

  $('#abc').click(function(){
    setSort('abc');
    //history.pushState(null, '', url+ (url.includes('?')? '&': '?')+'sort=abc');
    $('#mid').load(document.URL +  ' #mid>*');
  });

  $('#price').click(function(){
    setSort('price');
    $('#mid').load(document.URL +  ' #mid>*');
  });

  $('#rating').click(function(){
    setSort('rating');
    $('#mid').load(document.URL +  ' #mid>*');
  });

  $('#searchBtn').click(function(){
    $('#mid').load(document.URL +  ' #mid>*');
  });
  
  $(document).on("click", ".btn.btn-info.btn-block", function(){
    var id = $(this).prev().text();
    window.location.href = "http://allisfree.al/barber/reservationsPage.php?id="+id;
  });

</script>

</body>
</html>
