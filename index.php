<?php require './triangles.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Php - Website </title>
</head>
<body>
    <div id="wrapper">
    <h1><?php
    $T = new Triangles\BottomLeftTriangle();
    echo $T->create('orange', 5, 50);
    ?>
    <br>
    <div>
        <b> Counts: <?php echo Triangles\Ball::getCounter(); ?> </b>
    </div></h1>
    </div>
</body>
</html>