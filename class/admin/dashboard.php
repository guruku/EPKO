<?php 
require_once "admin.php";

    $ketua = [];
    foreach ($admin->getcalon('ketua') as $value) {
       $ketua[] =  ['name' => $value['name'], 'count' => $admin->getcountcalonresult($value['nis_siswa'])];
      
    }

    $wakilketua = [];
    foreach ($admin->getcalon('wakilketua') as $value) {
        $wakilketua[] =  ['name' => $value['name'], 'count' => $admin->getcountcalonresult($value['nis_siswa'])];
     }


    $siswa= $admin->getcount('siswa');
    $result= $admin->getcount('result');
    $users= $admin->getcount('users');
    $datatbcount = ['siswa' => $siswa,'result' => $result, 'users' =>$users];
    
    $data = ['datatb' => $datatbcount, 'ketua' => $ketua,'wakilketua' => $wakilketua];
    echo json_encode($data,true);
?>