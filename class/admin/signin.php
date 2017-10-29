<?php
require_once __DIR__ ."/admin.php";
// if($admin->ceklogin_admin() == true){
if(isset($_POST['username'])){
    if($admin->signin($_POST['username'],$_POST['password']) == true){
        // echo "berhasil";
        header('location:http://localhost/epko/admin/');
    }
    else{
        echo $admin->error;
    }
}
// }
?>