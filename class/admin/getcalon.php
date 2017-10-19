<?php 
require_once "admin.php";
   if(isset($_GET['calon'])){
        $calon = $_GET['calon'];
        $calon = $admin->getcalon($calon);
        echo json_encode($calon,true);
   }
?>