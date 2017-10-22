<?php
require_once ("kpko.php");

if(isset($_POST['username'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $token = $_POST['token'];

    if($token == $_SESSION['token']){
        $result = $kpko->signin($username,$password);
        if($result == "true"){
            $status = ['status'=>'true','message'=>'Login berhasil'];
        }
        else{
            $status = ['status'=>'false','message'=> $kpko->error];
        }
    }
    else{
        $status = ['status'=>'false','message'=>'signin gagal, token tidak valid'];
    }
    echo json_encode($status,true);    
}
?>