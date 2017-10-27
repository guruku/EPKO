<?php 
require_once "admin.php";

if(isset($_POST['nis'])){
    $nis = $_POST['nis'];
    $username = $_POST['username'];
    $password = $_POST['pass'];
    $users = $admin->insertusers($nis,$username,$password);
    if($users == true)
    {
        $status = ["status"=>true,"message"=>"Data berhasil di tambahkan"];
        echo json_encode($status,true);
    }
    else{
        $status = ["status"=>false,"message"=> $admin->error];
        echo json_encode($status,true);
    }
} 
?>