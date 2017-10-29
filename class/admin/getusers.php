<?php 
require_once __DIR__ ."/admin.php";
if($admin->ceklogin_admin() == true){
    $users = $admin->getusers();
    $data = ['data' => $users];
    echo json_encode($data,true);
}
?>