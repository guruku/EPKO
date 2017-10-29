<?php
require_once __DIR__ ."/admin.php";
// if($admin->ceklogin_admin() == true){
$admin->signout();
header("location:http://localhost/epko/admin/signin.php");
// }
?>