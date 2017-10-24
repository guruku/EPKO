<?php 
require_once ("class/kpko.php");

if($kpko->ceklogin_users() == true){
    header('location: index.php');
}

$token = $kpko->gettoken();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Signin</title>
    <link rel="stylesheet" href="assets/css/material.css">    
    <link rel="stylesheet" href="assets/css/login.css">
</head>
<body>
<div class="login">
    <h2>Sign In EPKO</h2>
        <input type="hidden" value="<?php echo $_SESSION['token'] ?>" id="input-token">
        <input class="input" type="text" placeholder="NIS / Username" id="input-username">
        <input class="input" type="password" placeholder="Password" id="input-password">
        <button class="button btn-aqua"  style="width:100%;margin-bottom:10px;"  onclick="signin()">Sign In</button>
    <br>
    <p class="to-action">Belum mempunyai akun?</p>
    <button class="button btn-grass btn-action" onclick="location.href='signup.php'">Sign Up</button>
</div>
<img src="assets/img/ts_aula.png" alt="" id="ts-aula">
<img src="assets/img/cloud1.png" alt="" id="cloud-1">
<img src="assets/img/cloud2.png" alt="" id="cloud-2">
<img src="assets/img/cloud3.png" alt="" id="cloud-3">
<img src="assets/img/cloud4.png" alt="" id="cloud-4">
</body>

<div class="modal" id="modal-alert">
        <div class="modal-content" id="">
            <h3 class="modal-title" id="title-alert">Alert</h3>
            <p id="alert-content"></p>
            <div id="btn-closemodal">
                <button class="button confirm-cancel btn-bitter" onclick="closeModal();">Ok</button>
            </div>
        </div>
</div>
<script src="assets/js/login2.js"></script>
</html>
<?php 
?>
