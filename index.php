<?php 
    require_once('connect.php');
    $_SESSION = array();
?>
<!DOCTYPE html>
<html>
<head>
<title>Barber Salon Login</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

<style>
.container {
    width: 30%;
    margin-top: 10%;
}
.form-label-group{
    margin-bottom: 5%;
}

body {
    font-family: Arial, Helvetica, sans-serif;
    background-image: url("./images/indexbg3.png");
}

body:background{
    filer:blur(2px);
}

/* Full-width input fields */
input[type=text], input[type=password], input[type=email] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

/* Set a style for all buttons */
button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

button:hover {
    opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
    position: relative;
}

img.avatar {
    width: 40%;
    border-radius: 50%;
}

.container {
    padding: 16px;
}

#idlogin{
    padding:30px;
    border-radius: 3%;
    background-color: whitesmoke;
    box-shadow: 5px 5px 10px #3b628a;
}

span.psw {
    float: right;
    padding-top: 16px;
}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
    position: absolute;
    right: 25px;
    top: 0;
    color: #000;
    font-size: 35px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: red;
    cursor: pointer;
}

/* Add Zoom Animation */
.animate {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
    from {-webkit-transform: scale(0)} 
    to {-webkit-transform: scale(1)}
}
    
@keyframes animatezoom {
    from {transform: scale(0)} 
    to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}

.toggle.btn.btn-success, .toggle.btn.btn-warning{
    width:100% !important;
}



</style>
</head>

<body>
<div id="idlogin" class="container">
    <form method="post" class="form-signin">
        <input style="width:100%" id="client" name="client" type="checkbox" checked data-toggle="toggle" data-on="Client" data-off="Salon" data-onstyle="success" data-offstyle="warning">
        <div class="form-label-group">
            <label for="inputEmail" style="padding-top: 15px; ">Email address</label>
            <input type="email" class="form-control" name="inputEmail" placeholder="Email address" required autofocus>
        </div>

        <div class="form-label-group">
            <label style="margin-bottom: 0px"for="inputPass">Password</label>
            <input type="password" class="form-control" name="inputPass" placeholder="Password" required>
        </div>

        <input type="submit" id="loginBtn" class="btn btn-lg btn-primary btn-block" value="Login"/><br>
        <a href="http://allisfree.al/barber/mainPage.php">Skip LogIn</a>
        <p align="center" onclick="if(document.getElementsByName('client')[0].checked) document.getElementById('id01').style.display='block'; else document.getElementById('id02').style.display='block';">Register ? </p>

        <div class="alert-danger">
        <?php
        if(isset($_GET['msg'])){
                    $msg = $_GET['msg'];
                    if($msg == 'invalidInput')
                        echo 'Input in register form is invalid!';
                    else if($msg == 'notRegistered')
                    echo 'You have not been registered, problem with database';
                }
                
        if(isset($_POST["inputEmail"]) && isset($_POST["inputPass"])){
            $email = $_POST["inputEmail"];
            $password = $_POST["inputPass"];
            $client = $_POST["client"];

            if(filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match('/^$|\s+/', $password)){
                if($client)
                    $query = "SELECT * FROM users WHERE email = '".$email."' AND password = '".$password."'";
                else
                    $query = "SELECT * FROM salons WHERE email = '".$email."' AND password = '".$password."'";
                $rs = mysqli_query($connection, $query) or die(mysqli_error($connection));

                if(mysqli_num_rows($rs)>0){
                    $row = $rs->fetch_assoc();
                    
                    $_SESSION["userName"] = $row["name"] ." ". $row["surname"];
                    if($client){
                        $_SESSION["userEmail"] = $row["email"];
                        echo '<script>window.location.href = "http://allisfree.al/barber/mainPage.php";</script>';
                    }else{
                        $_SESSION["salonId"] = $row["id"];
                        echo '<script>window.location.href = "http://allisfree.al/barber/salonPage.php";</script>';
                    }
                    //header("Location: http://allisfree.al/barber/mainPage.php");
                    exit();
                }else 
                    echo "Wrong Username or Password, please try again!";
            }else
                echo "Please provide a valid email and password";
        }
        ?>
</div>
<div class="alert-success">
    <?php 
        if(isset($_GET['msg'])){
                    $msg = $_GET['msg'];
                    if($msg == 'registered')
                        echo 'You have been registered, Please Login!';
                }
    ?>
</div>
        
    </form>
</div>

<div id="id01" class="modal">
  
  <form class="modal-content animate" action="register.php" method="post" style="width: 752px; height: 752px;">
    
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">×</span>
      <img src="http://allisfree.al/barber/images/avatar.png" alt="Avatar" class="avatar" style="width: 10%; height: auto">
    </div>

    <div class="container">
      <label for="Name"><b>Name</b></label>
      <input type="text" placeholder="Enter Name" name="name" required="" style="width:242px; border-radius: 4px;>
      
      <label for="Surname"><b>Surname</b></label>
      <input type="text" placeholder="Enter Surname" name="surname" required="" style="width:242px; border-radius: 4px;>
      
      <label for="Email"><b>Email</b></label>
      <input type="email" placeholder="Enter Email" name="email" required=""style="width:242px; border-radius: 4px;>

      <label for="Password"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password1" required="" style="width:242px; border-radius: 4px;">
      
      
      <label for="Retype Password"><b>Confirm Password</b></label>
      <input type="password" placeholder="Confirm Password" name="password2" required="" style="width:242px; border-radius: 4px;">
    <input class="btn btn-info" type= "submit" value="Register" style="width:242px;>
        
    </div>
  </form>
</div>




<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

</body>

</html>