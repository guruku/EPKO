<?php 
require_once __DIR__ ."/admin.php";
if($admin->ceklogin_admin() == true){
   if(isset($_GET['calon'])){
        $calon = $_GET['calon'];
        $calon = $admin->getcalon($calon);
        echo json_encode($calon,true);
   }
}
?>