<?php 
require_once "admin.php";

if(isset($_POST['nis'])){
    $nis = $_POST['nis'];
    $password = $_POST['password'];
    $users = $admin->updateusers($password,$nis);
    if($users == true)
    {
        $status = ["status"=>true,"message"=>"Data berhasil di update"];
        echo json_encode($status,true);
    }
    else{
        $status = ["status"=>true,"message"=> $admin->error];
        echo json_encode($status,true);
    }
}
?>