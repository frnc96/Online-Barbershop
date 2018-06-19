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
    
    .btn-file {
        position: relative;
        overflow: hidden;
    }
    
    .btn-file input[type=file] {
        position: absolute;
        top: 0;
        right: 0;
        min-width: 100%;
        min-height: 100%;
        font-size: 100px;
        text-align: right;
        filter: alpha(opacity=0);
        opacity: 0;
        outline: none;
        background: white;
        cursor: inherit;
        display: block;
    }
  </style>
</head>
<body>

<!-- Navigation bar -->
<div class="topnav" style="background:#fed330">
  
  <a href="http://allisfree.al/barber/salonPage.php" class="resize" style="
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

<a class="active" href="http://allisfree.al/barber/salonPage.php"><?php echo $_SESSION["userName"]; ?>'s Administrator Page</a>
<a href="http://allisfree.al/barber/index.php">LogOut</a>

</div>
  
<div id="whole" class="container-fluid text-center">    
  <div class="row content">

    <!-- Left part of the page -->
    <div class="col-sm-2 sidenav">
      
        <div class="list-group">
            <button id="newRes" type="button" class="list-group-item list-group-item-action">Add New Reservations</button>
            <button id="delRes" type="button" class="list-group-item list-group-item-action">Remove Reservations</button>
        </div>
        <button id="resetTbl" type="button" class="btn btn-info btn-block">Reset Current Table</button>
        <button id="addBarber" type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#myModal">Add Barber</button>
        <button id="remBarber" type="button" class="btn btn-danger btn-block">Remove Barber</button>
      
    </div>

    <!-- Middle part of the page -->
    <div id="mid" class="col-sm-8 text-left">
        <?php
            if(isset($_SESSION['salonId'])){
                $query = "SELECT * FROM barbers WHERE shopId = ".$_SESSION['salonId'];
                $rs = mysqli_query($connection, $query) or die(mysqli_error($connection));
                
                echo '<p style="text-align: center;"><strong style="font-size: 3em">Please select a barber to manage</strong></p>';
                
                while($row = mysqli_fetch_array($rs)){
                    echo '<div class="col-sm-3" style="padding-top: 3%;">';
                        echo '<div class="barber" style="border-radius: 50%; height: 200px; width: 200px; overflow: hidden">';
                            echo '<img src="data:image/jpeg;base64,'.base64_encode( $row["profilePic"] ).'" style="width: 100%; height: auto">';
                            echo '<p id = "barberId" style="display: none">'.$row['barberId'].'</p>';
                        echo '</div>';
                        echo '<p style="text-align: center; font-size: 1.5em">'.$row['fullName'].'</p>';
                    echo '</div>';
                }
                
            }else echo "Error!!! No salon found";
            
            if(isset($_GET['barberId'])){
                $query = "SELECT * FROM barbers WHERE barberId = ".$_GET['barberId'];
                $rs = mysqli_query($connection, $query) or die(mysqli_error($connection));
                
                while($row = mysqli_fetch_array($rs)){
                    
                    echo '<p style="text-align: center;"><strong style="font-size: 2em">Here you can modify the reservations of '.$row["fullName"].'</strong></p></br>';
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
                    
                    echo '<button style="margin-bottom: 10px; width: 50%; float: right" class="btn btn-block btn-success" id="confirmRes">Confirm Changes</button>';
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
      <div class="well">
        <p>ADS</p>
      </div>
      <div class="well">
        <p>ADS</p>
      </div>

    </div>
    
    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Fill the form to add a new barber</h4>
                </div>
                <div class="modal-body">
                    
                    <form method="POST" class="form-signin" id="modalForm">
                        <div class="form-label-group">
                            <input type="text" name="fName" placeholder="Full Name" required></input>
                            <span class="btn btn-default btn-file">
                                Select Profile Pic <input type="file" name="pic" required>
                            </span>
                        </div>
                        </form>
                        
                </div>
                <div class="modal-footer">
                    <button id="saveBtn" type="submit" class="btn btn-success">Save</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

  </div>
</div>

<script>
var _canReserve = true;
var _barberId = $('#selBarber').text();
var _newRes = false;
var _delRes = false;

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
  
  $(document).on('click','#confirmRes',function(){
    var res = false;
    var del = false;
    var rowsArray = {};
    var i = 0;
    $('#scheduleTable tr').each(function(){
        var currRow = $(this).html();
        
        if(currRow.includes('btn btn-block schedule btn-warning')){
            currRow = currRow.replace(/btn btn-block schedule btn-warning/g,'btn btn-block schedule btn-danger');
            res = true;
        }else if(currRow.includes('btn btn-block schedule btn-success')){
                currRow = currRow.replace(/btn btn-block schedule btn-success/g,'btn btn-block schedule btn-info');
                del = true;
            }
        rowsArray[i] = currRow;
        i++;
    });
    
    if(res || del){
        $.ajax({
        type: 'POST',
        url: 'http://allisfree.al/barber/uploadSchedule.php',
        data: { myarray : rowsArray, id : _barberId },
        success: function(result) {
            if(result==1){
                //data was inserted
                url = getCurrentUrl();
                alert('The change was submitted');
                parent.location = url.replace(/\?barberId=[0-9]+/,'');
            }else{
                //data was not inserted
                alert('Could not insert data in the database: '+_barberId);
                $('#mid').load(document.URL +  ' #mid>*');
                }
            }
        });
    }else alert('You need to make a change in order to save');
  });
  
  $('.list-group-item.list-group-item-action').click(function(){
      $.each($('.list-group-item.list-group-item-action'),function(index, element){
          $(element).removeClass('active');
      });
      $(this).addClass('active');
  });
  
  $('#newRes').click(function(){
      _newRes = true;
      _delRes = false;
      
        $(document).on('click','.btn.btn-block.schedule.btn-info',function(){
            if(_newRes){
                $(this).removeClass('btn-info').addClass('btn-warning');
                $(this).attr('title',$('#userName').text());
            }
        });
  
        $(document).on('click','.btn.btn-block.schedule.btn-warning',function(){
            if(_newRes){
                $(this).removeClass('btn-warning').addClass('btn-info');
                $(this).attr('title','');
                _canReserve = true;
            }
        });
  });
  
  $('#delRes').click(function(){
      _newRes = false;
      _delRes = true;
      var userRes;
      
        $(document).on('click','.btn.btn-block.schedule.btn-danger',function(){
            if(_delRes) $(this).removeClass('btn-danger').addClass('btn-success');
            userRes = $(this).attr('title');
            $(this).attr('title','');
        });
  
        $(document).on('click','.btn.btn-block.schedule.btn-success',function(){
            if(_delRes) $(this).removeClass('btn-success').addClass('btn-danger');
            $(this).attr('title',userRes);
        });
  });
  
  $(document).on('click','#resetTbl',function(){
        if(_barberId){
            if(confirm('Are you sure yo want to delete all of the scheduled times?')){
                var rowsArray = {};
                var i = 0;
                $('#scheduleTable tr').each(function(){
                    var currRow = $(this).html();
                    currRow = currRow.replace(/btn btn-block schedule btn-warning/g,'btn btn-block schedule btn-info');
                    currRow = currRow.replace(/btn btn-block schedule btn-danger/g,'btn btn-block schedule btn-info');
                    currRow = currRow.replace(/btn btn-block schedule btn-success/g,'btn btn-block schedule btn-info');
                    rowsArray[i] = currRow;
                    i++;
                });
                $.ajax({
                    type: 'POST',
                    url: 'http://allisfree.al/barber/uploadSchedule.php',
                    data: { myarray : rowsArray, id : _barberId },
                    success: function(result) {
                        if(result==1){
                            //data was inserted
                            url = getCurrentUrl();
                            alert('The table was cleared');
                            parent.location = url.replace(/\?barberId=[0-9]+/,'');
                        }else{
                            //data was not inserted
                            alert('Could not update table in db: '+_barberId);
                            $('#mid').load(document.URL +  ' #mid>*');
                        }
                    }
                });
          }
      }else alert('Please select a barber first');
  });
  
  $('#saveBtn').click(function(){
      var myform = document.getElementById("modalForm");
      var modalForm = new FormData(myform);
      $.ajax({
        url: 'http://allisfree.al/barber/addBarber.php',
        cache: false,
        processData: false,
        contentType: false,
        type: 'post',
        data: modalForm,
        success: function(result) {
                   if(result=='Success'){
                        //data was inserted
                        alert('The barber was added');
                        $('#myModal').modal('toggle');
                        $('#mid').load(document.URL +  ' #mid>*');
                    }else if(result=='Failure'){
                        //data was not inserted
                        alert('Could not add barber');
                    }else{
                        alert('Invalid input...');
                    }
                 }
    });
  });
  
  $('#remBarber').click(function(){
      if(confirm('Are you sure you want to remove this barber?')){
            if(_barberId){
                $.ajax({
                    url: 'http://allisfree.al/barber/remBarber.php',
                    type: 'post',
                    data: {barberId: _barberId},
                    success: function(result) {
                            if(result=='Success'){
                                //data was inserted
                                alert('The barber was removed');
                                $('#mid').load(document.URL +  ' #mid>*');
                            }else{
                                //data was not inserted
                                alert(result);
                            }
                        }
                });
            }else alert('Please select a barber to remove');
        }
  });
</script>


</body>
</html>