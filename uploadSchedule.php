<?php
    require_once('connect.php');
    $array = isset($_POST['myarray']) ? $_POST['myarray'] : false;
    $id = isset($_POST['id']) ? $_POST['id'] : false;
    if ($array && $id) { 
        $arrayS = serialize($array);
        
        $query = "UPDATE barbers SET schedule='".$arrayS."' WHERE barberId=".$id;
        echo $connection->query($query);
        
        $connection->close();
    }
    
    function teJetKtu(){
        $hours = array('8:00','9:00','10:00','11:00','12:00','13:00','14:00','15:00','16:00','17:00','18:00','19:00','20:00');
                    echo '<table id="scheduleTable" class="table table-hover">';
                        echo '<thead>';
                            echo '<tr>';
                                echo '<th scope="col">'.$row['barberId'].'</th>';
                                echo '<th scope="col">Monday</th>';
                                echo '<th scope="col">Tuesday</th>';
                                echo '<th scope="col">Wednesday</th>';
                                echo '<th scope="col">Thursday</th>';
                                echo '<th scope="col">Friday</th>';
                                echo '<th scope="col">Saturday</th>';
                            echo '</tr>';
                        echo '</thead>';
                        foreach($hours as $hour){
                            echo '<tr>';
                                echo '<td align="center" scope="row">'.$hour.'</th>';
                                echo '<td><button class="btn btn-block schedule btn-info"></button></td>';
                                echo '<td><button class="btn btn-block schedule btn-info"></button></td>';
                                echo '<td><button class="btn btn-block schedule btn-info"></button></td>';
                                echo '<td><button class="btn btn-block schedule btn-info"></button></td>';
                                echo '<td><button class="btn btn-block schedule btn-info"></button></td>';
                                echo '<td><button class="btn btn-block schedule btn-info"></button></td>';
                            echo '</tr>';
                        }
                    echo '</table>';
                    //<th scope="col">1</th><th scope="col">Monday</th><th scope="col">Tuesday</th><th scope="col">Wednesday</th><th scope="col">Thursday</th><th scope="col">Friday</th><th scope="col">Saturday</th>")</script><button style="margin-bottom: 10px; width: 50%; float: right" class="btn btn-block btn-success" id="confirmRes">Confirm Reservation</button>
    }
?>