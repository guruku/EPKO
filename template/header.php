<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>EPKO</title>
    <link rel="stylesheet" href="assets/css/material.css">    
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>
    <div class="wrapper">
        <header>
            <img class="container" src="assets/img/logo.png" alt="">
        </header>
        <nav>
            <div id="nav-menu" onclick="navMenu()">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            <ul id="nav-content">
                <li onclick="about()" style="cursor:pointer;">
                    <a>About</a>
                </li>
                <li style="float:right">
                    <a href="class/logout.php">Logout</a>
                </li>
                <li style="float:right">
                    <a>Hello, <?php echo $_SESSION['users_username'] ?></a>
                </li>
            </ul>    
        </nav>