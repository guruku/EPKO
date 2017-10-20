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
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/login.css">
    <!-- <script src='https://www.google.com/recaptcha/api.js'></script> -->
</head>
<body>
<div class="login">
    <h2>Sign Up EPKO</h2>
        <input type="hidden" value="<?php echo $_SESSION['token'] ?>" id="input-token">
        <input class="input" type="text" placeholder="NIS" id="input-nis">
        <input class="input" type="text" placeholder="Username" id="input-username">
        <input class="input" type="password" placeholder="Password" id="input-password">
        <input class="input" type="password" placeholder="Re-type Password" id="input-retypepassword">
        <button class="button" onclick="signup()">Signup</button>
    <!-- <div class="g-recaptcha" data-sitekey="6Le7GjUUAAAAALlbF5Mflluq9jp37CZ3QsNfZ62I"></div> -->
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