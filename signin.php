<?php 
require_once ("class/kpko.php");

if($kpko->ceklogin_users() == true){
    header('location: index.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/login.css">
</head>
<body>
<div class="login">
    <h2>Sign In EPKO</h2>
        <input class="input" type="text" placeholder="Username" id="input-username">
        <input class="input" type="password" placeholder="Password" id="input-password">
        <button class="button" onclick="signin()">Login</button>
        <button class="button" onclick="location.href='signup.php'">Signup</button>
    <br>
    <small>*mengalami masalah? hubungi panitia.</small>
</div>
<div class="login-alert">
    <p>NIS atau password yang anda masukan salah.</p>
</div>
<script src="assets/js/login.js"></script>
</body>
</html>
<?php 
?>