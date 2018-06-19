<?php 
  require_once('connect.php'); 
  $_SESSION["query"] = "SELECT * FROM salons";
?>
<!DOCTYPE html>
<html lang="en"><head>
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

    #button, #cardBtn{
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
    
    .barber{
        width: 150px; 
        height: 150px; 
        border-radius: 50%; 
        overflow: hidden; 
        cursor: pointer;
    }
    
    .barber:hover{
        opacity: 0.7;
    }
    
    .schedule{
        width: 80%;
        height: 20px;
        opacity: 0.7;
    }
    
    td{
        width: 14%;
    }
    
    th{
        text-align: center;
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
    echo '<a class="active" href="http://allisfree.al/barber/reservationsPage.php">Reservations</a>';
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
<div id="whole" class="container-fluid text-center">    
  <div class="row content">

    <!-- Left part of the page -->
    <div class="col-sm-2 sidenav">
      
    </div>

    <!-- Middle part of the page -->
    <div id="mid" class="col-sm-8 text-left">
        <?php
            if(isset($_GET['id'])&&isset($_SESSION['userEmail'])){
                $query = "SELECT * FROM barbers WHERE shopId = ".$_GET['id'];
                $rs = mysqli_query($connection, $query) or die(mysqli_error($connection));
                
                echo '<p style="text-align: center;"><strong style="font-size: 3em">Please select a barber</strong></p>';
                
                while($row = mysqli_fetch_array($rs)){
                    echo '<div class="col-sm-3" style="padding-top: 3%;">';
                        echo '<div class="barber" style="border-radius: 50%; height: 200px; width: 200px; overflow: hidden">';
                            echo '<img src="data:image/jpeg;base64,'.base64_encode( $row["profilePic"] ).'" style="width: 100%; height: auto">';
                            echo '<p style="display: none">'.$row['barberId'].'</p>';
                        echo '</div>';
                        echo '<p style="text-align: center; font-size: 1.5em">'.$row['fullName'].'</p>';
                    echo '</div>';
                }
                
            }else if(!isset($_SESSION['userEmail'])){
                echo '<script>window.location.replace("http://allisfree.al/barber/index.php")</script>';
            }else{
                echo 'You have to select a salon first';
            }
            
            if(isset($_GET['barberId'])){
                $query = "SELECT * FROM barbers WHERE barberId = ".$_GET['barberId'];
                $rs = mysqli_query($connection, $query) or die(mysqli_error($connection));
                
                while($row = mysqli_fetch_array($rs)){
                    echo '<p style="text-align: center;"><strong style="font-size: 2em">'.$row["fullName"].'</strong></p>';
                    echo '<p style="text-align: center;"><strong style="font-size: 3em">Now select a time and day</strong></p></br>';
                    
                    $tableArray = unserialize($row['schedule']);
                    
                    echo '<table id="scheduleTable" class="table table-hover">';
                        echo '<thead>';
                            echo $tableArray[0];
                        echo '</thead>';
                        for($i=1; $i<13; $i++){
                            echo '<tr>';
                                echo $tableArray[$i];
                            echo '</tr>';
                        }
                    echo '</table>';
                    
                    echo '<button style="margin-bottom: 10px; width: 50%; float: right" class="btn btn-block btn-success" id="confirmRes">Confirm Reservation</button>';
                    break;
                }
            }
        ?>    
    </div>

    <!-- Right part of the page -->
    <div class="col-sm-2 sidenav">
        <!-- Hidden fields -->
        <p id="userName" style="display: none"><?php echo $_SESSION["userName"]; ?></p>
        <p id="selBarber" style="display: none"><?php if(isset($_GET["barberId"])) echo $_GET["barberId"]; ?></p>
        
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
var _canReserve = true;
var _barberId = $('#selBarber').text();

function getCurrentUrl(){
  var fUrl = window.location.href;
  var url = fUrl.replace('http://localhost','');
  return url;
}

  $(document).on('click','.barber',function(){
    var id = $(this).children().next().text();
    var url = getCurrentUrl();
    _barberId = id;
    
    if(!url.includes('barberId')){
        history.pushState(null, '', url+ (url.includes('?')? '&': '?')+'barberId='+id);
        //parent.location = (url.includes('?')? url+'&': '?')+'barberId='+id;
        $('#mid').load(document.URL +  ' #mid>*');
    }
    else{
        var result = url.match(/barberId=[0-9]+/);
        history.pushState(null, '',url.replace(result[0],'barberId=')+id);
        //parent.location = url.replace(result[0],'barberId=')+id;
        $('#mid').load(document.URL +  ' #mid>*');
    }
  });
  
  $(document).on('click','.btn.btn-block.schedule.btn-info',function(){
      if(_canReserve){
          $(this).removeClass('btn-info').addClass('btn-warning');
          $(this).attr('title',$('#userName').text());
          _canReserve = false;
      }
  });
  
  $(document).on('click','.btn.btn-block.schedule.btn-warning',function(){
      $(this).removeClass('btn-warning').addClass('btn-info');
      $(this).attr('title','');
      _canReserve = true;
  });
  
  $(document).on('click','#confirmRes',function(){
    var res = false;
    var rowsArray = {};
    var i = 0;
    $('#scheduleTable tr').each(function(){
        var currRow = $(this).html();
        if(currRow.includes('btn btn-block schedule btn-warning')){
            currRow = currRow.replace('btn btn-block schedule btn-warning','btn btn-block schedule btn-danger');
            res = true;
        }
        rowsArray[i] = currRow;
        i++;
    });
    
    if(res){
        $.ajax({
        type: 'POST',
        url: 'http://allisfree.al/barber/uploadSchedule.php',
        data: { myarray : rowsArray, id : _barberId },
        success: function(result) {
            if(result==1){
                //data was inserted
                url = getCurrentUrl();
                alert('The reservation was submitted');
                parent.location = url.replace(/&barberId=[0-9]+/,'');
            }else{
                //data was not inserted
                alert('Could not insert data in the database: '+_barberId);
                $('#mid').load(document.URL +  ' #mid>*');
                }
            }
        });
    }else alert('Please select a time and day');
  });
  
  $('#srchBtn').click(function(){
      //parent.location = 'http://www.allisfree.al/barber/mainPage.php?search='+$('#search').text();
  });
</script>


</body>
</html>