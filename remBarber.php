<?php 
    require_once('connect.php');
    $barberId = isset($_POST['barberId']) ? $_POST['barberId'] : false;
    
    if($barberId){
        $query = "DELETE FROM barbers WHERE barberId =$barberId";
        if(mysqli_query($connection,$query)){
            echo 'Success';
        }else echo 'Failure';
        
        $connection->close();
    }
?>