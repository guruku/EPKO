<?php 
require_once ("class/kpko.php");
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
    <form action="">
        <input class="input" type="text" placeholder="Username">
        <input class="input" type="text" placeholder="Password">
        <button class="button">Login</button>
    </form>
    <br>
    <small>*mengalami masalah? hubungi panitia.</small>
</div>
<div class="login-alert">
    <p>NIS atau password yang anda masukan salah.</p>
</div>
</body>
</html>
<?php 
?>