<?php
require_once ("kpko.php");

if(isset($_POST['username'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = $kpko->signin($username,$password);
    if($result == "true"){
        $status = ['status'=>'true','message'=>'Login berhasil'];
    }
    else{
        $status = ['status'=>'false','message'=> $kpko->error];
    }
    echo json_encode($status,true);    
}
?>