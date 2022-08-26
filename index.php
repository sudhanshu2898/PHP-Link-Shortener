<?php
    require('connect.php');

    if(!isset($_SESSION['admin'])){
        header('Location:login.php');
    }

    if(isset($_POST['short'])){
        $long = $_POST['url'];
        $short = time();
        $SQL = "INSERT INTO `links`(`short`,`full`,`time`,`visit`)VALUE('$short','$long','$short','0')";
        if(mysqli_query($connection, $SQL)){
            $message = '<div class="alert alert-success text-center my-4">Link has been Shorted.</div>';
        }else{
            $message = '<div class="alert alert-danger text-center my-4">Opps Something went wrong</div>';
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
    <nav class="navbar navbar-light bg-white shadow-sm px-4 py-3">
        <a class="navbar-brand" href="#">
            IWT Project
        </a>
        <a href="logout.php" class="btn btn-primary">Logout</a>
    </nav>

    <div class="p-5">
        <div class="p-5 shadow rounded">
            <h3 class="h3 text-center font-weight-normal mb-5">Short Links</h5>
            <?php
                if(isset($message)){
                    print($message);
                }
            ?>
            <form method="post" action="">
                <input type="text" name="url" class="form-control p-4 mb-4" placeholder="Eg: https://amazon.com/radio/samsung-2020-radio?color=red&size=3w&ref=footer">
                <input type="submit" name="short" value="Short Link" class="btn btn-primary py-3 w-100">
            </form>
        </div>
    </div>

    <?php
        $linksResult = mysqli_query($connection, "SELECT * FROM `links`");
    ?>

    <div class="p-5">
        <table class="table table-striped table-borderless table-hover shadow-sm">
            <thead class="thead-dark">
                <tr>
                    <th>Original Url</th>
                    <th>Short Url</th>
                    <th>Create Time</th>
                    <th>Visits</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($linksRow = mysqli_fetch_assoc($linksResult)){
                        print('<tr>');
                        print('<td style="max-width:250px; white-space:nowrap; overflow: hidden; text-overflow: ellipsis;">'.$linksRow['full'].'</td>');
                        print('<td>http://localhost/iwt/a/'.$linksRow['short'].'</td>');
                        print('<td>'.date('d-M-Y h:iA',$linksRow['time']).'</td>');
                        print('<td>'.$linksRow['visit'].'</td>');
                        print('<td><a href="delete.php?id='.$linksRow['id'].'" class="btn btn-danger">Delete</a></td>');
                        print('</tr>');
                    }
                ?>
            </tbody>
        </table>
    </div>



</body>
</html>