<?php
    session_start();
    $connection = mysqli_connect('localhost','allisfree_bar','Barbershop123');
    if(!$connection)
        die("Database connection failed " . mysqli_error($connection));

    $select_db = mysqli_select_db($connection, 'allisfree_barber');
    if(!$select_db)
        die("Database selection failed " . mysqli_error($connection));
        
    define('BASE_URL','http://www.allisfree.al/barber/');


?>