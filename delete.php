<?php
    require('connect.php');
    $id = $_GET['id'];
    mysqli_query($connection, "DELETE FROM links WHERE id = '$id'");
    header('Location:index.php');
?>