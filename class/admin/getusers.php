<?php 
require_once "admin.php";
    $users = $admin->getusers();
    $data = ['data' => $users];
    echo json_encode($data,true);
?>