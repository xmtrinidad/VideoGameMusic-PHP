<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/nav.css">
    <link rel="stylesheet" href="./css/boxes.css">
    <link rel="stylesheet" href="./css/main.css">
    <title>Document</title>
</head>
<body>
    <nav class="Nav">
        <?php include('desktop-nav.php'); ?>
        <div class="Nav__menu">
            <i class="fa fa-bars" aria-hidden="true"></i>
        </div>
        <div class="Nav__add">
            <a href="add-music.php" class="btn">Add Music</a>
        </div>
        <?php include('mobile-nav.php'); ?>
    </nav>