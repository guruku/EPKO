<?php
require_once ("kpko.php");

if(isset($_POST['token'])){
    $token = $_POST['token'];
    $nis = $_POST['nis'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    if($token == $_SESSION['token']){
        if($kpko->signup($nis,$username,$password) == true){
            $status = ['status'=>'true','message'=>'signup berhasil, klik ok untuk lanjut login'];
        }
        else{
            $status = ['status'=>'false','message'=>'gagal, nis tidak terdaftar / nis yang dimasukan sudah pernah mendaftar'];
        }
    }
    else{
        $status = ['status'=>'false','message'=>'signup gagal, token tidak valid'];
    }
    echo json_encode($status,true);
}
?>