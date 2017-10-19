<?php 
require_once "admin.php";

if(isset($_POST['nis'])){
    $nis = $_POST['nis'];
    $calon = $_POST['calon'];
    $imgpath = $_POST['imgpath'];
    $visi = $_POST['visi'];
    $misi = $_POST['misi'];
    $siswa = $admin->insertcalon($calon,$nis,$imgpath,$visi,$misi);
    if($siswa == true)
    {
        $status = ["status"=>true,"message"=>"Data berhasil di tambahkan"];
        echo json_encode($status,true);
    }
    else{
        $status = ["status"=>true,"message"=> $admin->error];
        echo json_encode($status,true);
    }
}
?>