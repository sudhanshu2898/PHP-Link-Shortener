<?php
    require('connect.php');

    if(isset($_SESSION['admin'])){
        header('Location:index.php');
    }

    if(isset($_POST['login'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $SQL = "SELECT * FROM `admin` WHERE `email` = '$email' AND `pass` = '$password'";
        $RESULT = mysqli_query($connection, $SQL);
        if(mysqli_num_rows($RESULT) == 1){
            $ROW = mysqli_fetch_assoc($RESULT);
            $_SESSION['admin'] = $ROW['id'];
            header('Location:index.php');
        }else{
            $message = '<div class="alert alert-danger text-center mb-0 mt-4">Please Enter correct Login id and password</div>';
        }
    }



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Link Shortner</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <div class="container my-5 mx-auto pt-5">
        <div class="mx-auto w-50 shadow p-5 rounded">
            <form action="" method="post">
                <h4 class="h4 mb-5 font-weight-normal text-center">IWT Admin Login</h4>
                <input type="text" class="form-control p-4 mb-4" name="email" placeholder="Email">
                <input type="password" class="form-control p-4 mb-4" name="password" placeholder="Password">
                <input type="submit" name="login" value="Login" class="w-100 btn btn-primary py-3">
            </form>
            <?php
                if(isset($message)){
                    print($message);
                }
            ?>
        </div>
    </div>
</body>
</html>