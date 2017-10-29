<?php 
require_once "../class/admin/admin.php";

if($admin->ceklogin_admin() == true){
    header("location:index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Signin</title>
    <link rel="stylesheet" href="../assets/css/material.css">    
    <link rel="stylesheet" href="../assets/css/login.css">
</head>
<body>
<div class="login">
    <h2>Admin Login</h2>
        <form action="../class/admin/signin.php" method="POST">
            <input class="input" type="text" placeholder="Username" id="input-username" name="username">
            <input class="input" type="password" placeholder="Password" id="input-password" name="password">
            <button class="button btn-aqua" type="submit" style="width:100%;margin-bottom:10px;">Login</button>
        </form>
    <br>
</body>
</html>