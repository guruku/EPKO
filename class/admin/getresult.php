<?php 
require_once __DIR__ ."/admin.php";
if($admin->ceklogin_admin() == true){
    $result = $admin->getresult();
    $data = ['data' => $result];
    echo json_encode($data,true);
}
?>