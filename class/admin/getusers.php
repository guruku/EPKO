<?php 
require_once "admin.php";
    $users = $admin->getusers();
    echo json_encode($users,true);
?>