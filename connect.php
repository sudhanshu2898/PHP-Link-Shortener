<?php
    $connection = mysqli_connect("localhost","root","","short");
    if(!$connection){
        die('Failed to connect to database');
    }
    session_start();
?>