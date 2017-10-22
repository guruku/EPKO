<?php 
require_once ("class/kpko.php");
$token = $kpko->gettoken();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Signup</title>
    <link rel="stylesheet" href="assets/css/material.css">    
    <link rel="stylesheet" href="assets/css/login.css">
    <script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>
<div class="login">
    <h2>Sign Up EPKO</h2>
        <input type="hidden" value="<?php echo $_SESSION['token'] ?>" id="input-token">
        <input class="input" type="text" placeholder="NIS" id="input-nis">
        <input class="input" type="text" placeholder="Username" id="input-username">
        <input class="input" type="password" placeholder="Password" id="input-password">
        <input class="input" type="password" placeholder="Re-type Password" id="input-retypepassword">
        <br>
        <div class="g-recaptcha" data-sitekey="6LceQzUUAAAAAKwNJIYTsKN4U-Yujk7Pk8CGmUkl"></div>
        <br>
        <button class="button btn-grass" onclick="signup()">Sign Up</button>
        <br>
        <p class="to-action">Sudah mempunyai akun?</p>
        <button class="button btn-aqua btn-action" onclick="location.href='signin.php'">Sign In</button>
    <br>
</div>
<div class="modal" id="modal-alert">
        <div class="modal-content" id="">
            <h3 class="modal-title">Alert</h3>
            <p id="alert-content"></p>
            <button id="btn-closemodal" class="button confirm-cancel btn-bitter" onclick="closeModal();">Ok</button>
        </div>
</div>
<script src="assets/js/login.js"></script>
</body>
</html>
<?php 
?>