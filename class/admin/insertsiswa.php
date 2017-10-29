<?php 
require_once __DIR__ ."/admin.php";
if($admin->ceklogin_admin() == true){
if(isset($_POST['nis'])){
    $nis = $_POST['nis'];
    $name = $_POST['name'];
    $gender = $_POST['gender'];    
    $kelas = $_POST['kelas'];
    $siswa = $admin->insertsiswa($nis,$name,$gender,$kelas);
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
}
?>