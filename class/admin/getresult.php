<?php 
require_once "admin.php";
    $result = $admin->getresult();
    $data = ['data' => $result];
    echo json_encode($data,true);
?>