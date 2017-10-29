<?php 
require_once __DIR__ ."/admin.php";
if($admin->ceklogin_admin() == true){
if(isset($_POST['id'])){
    $id = $_POST['id'];
    $delete = $admin->deleteusers($id);
    if($delete == true)
    {
        $status = ["status"=>true,"message"=>"Data berhasil di hapus"];
        echo json_encode($status,true);
    }
    else{
        $status = ["status"=>false,"message"=> $admin->error];
        echo json_encode($status,true);
    }
}
}
?>