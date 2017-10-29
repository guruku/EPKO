<?php 
require_once __DIR__ ."/admin.php";
if($admin->ceklogin_admin() == true){
if(isset($_POST['id'])){
    $id = $_POST['id'];
    $calon = $_POST['calon'];
    $delete = $admin->deletecalon($calon,$id);
    if($delete == true)
    {
        $status = ["status"=>true,"message"=>"Data berhasil di hapus"];
        echo json_encode($status,true);
    }
    else{
        $status = ["status"=>true,"message"=> $admin->error];
        echo json_encode($status,true);
    }
}
}
?>