<?php 
require_once __DIR__ ."/admin.php";
if($admin->ceklogin_admin() == true){
if(isset($_GET['page'])){
    $page = $_GET['page'];
    $data = $_GET['data'];

    $table = null;
    if($data == 'siswa'){
        $table = 'siswa';
    }
    else if($data == 'users'){
        $table = 'users';
    }
    else if($data == 'result'){
        $table = 'result';
    }

    $admin->rows = 20;
    echo json_encode($admin->pagging($page,$table),true);
}
}
// echo 'yoho';
?>