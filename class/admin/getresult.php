<?php 
require_once "admin.php";
    $result = $admin->getresult();
    echo json_encode($result,true);
?>