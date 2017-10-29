<?php 
require_once __DIR__ ."/admin.php";
if($admin->ceklogin_admin() == true){
if(isset($_GET['search'])){
    $search = $_GET['search'];
    $siswa = $admin->getsiswa($search);
    echo json_encode($siswa,true);
}
else{
    $siswa = $admin->getsiswaall();
    $data = ['data' => $siswa];
    echo json_encode($data);
}
}
?>