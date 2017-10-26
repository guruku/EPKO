<?php 
require_once "admin.php";

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
?>