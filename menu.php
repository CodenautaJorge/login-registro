<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

</head>

<?php if(isset($_SESSION['user_id'])){ ?>

<body>

    <div class="container justify-content-center mt-5">

        <h5 class=""><?= $_SESSION['user_name'] . ' ' . $_SESSION['user_surname'] ?></h5>
        <h5 class=""><?= $_SESSION['user_email'] ?></h5>
        <a href="./controllers/logout.php">Salir</a>


    </div>
    
</body>

<?php }else{
    require('./404.php');
 } ?>
</html>