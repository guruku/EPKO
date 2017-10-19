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
    <script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>
<div class="login">
    <h2>Sign Up EPKO</h2>
    <form action="">
        <input class="input" type="text" placeholder="NIS">
        <input class="input" type="text" placeholder="Username">
        <input class="input" type="password" placeholder="Password">
        <input class="input" type="password" placeholder="Re-type Password">
        <button class="button">Signup</button>
    </form>
    <div class="g-recaptcha" data-sitekey="6Le7GjUUAAAAALlbF5Mflluq9jp37CZ3QsNfZ62I"></div>
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