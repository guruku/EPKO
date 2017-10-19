<?php 
require_once "admin.php";

if(isset($_POST['nis'])){
    $calon = $_POST['calon'];
    $imgpath = $_POST['imgpath'];
    $visi = $_POST['visi'];
    $misi = $_POST['misi'];
    $nis = $_POST['nis'];
    $calon = $admin->updatecalon($calon,$imgpath,$visi,$misi,$nis);
    if($calon == true)
    {
        $status = ["status"=>true,"message"=>"Data berhasil di update"];
        echo json_encode($status,true);
    }
    else{
        $status = ["status"=>true,"message"=> $admin->error];
        echo json_encode($status,true);
    }
}
?>