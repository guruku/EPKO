<?php 
require_once "admin.php";

$admin->rows = 20;
if(isset($_GET['data'])){
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

    $rows = [];
    for ($i=0; $i < $admin->getrows($table); $i++) { 
        $rows[] = 'mbuhah';
    }
    echo json_encode($rows,true);
};
?>