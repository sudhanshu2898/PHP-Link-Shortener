<?php
    require('connect.php');
    if(isset($_GET['url'])){
        $short = $_GET['url'];
        $SQL = "SELECT * FROM links WHERE short = '$short'";
        $RESULT = mysqli_query($connection, $SQL);
        if(mysqli_num_rows($RESULT) == 1){
            $row = mysqli_fetch_assoc($RESULT);
            $id = $row['id'];
            mysqli_query($connection, "UPDATE links SET visit = visit+1 WHERE id = '$id'");

            header('Location:'.$row['full']);
        }else{
            print('Please Enter valid url');
        }
    }else{
        print('No Short link was found');
    }
?>