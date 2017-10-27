<?php 
date_default_timezone_set ('Asia/Jakarta');
$sekarang =  strtotime(Date('G:i:s'));
$pemilihan = strtotime('13:00:00');
$tanggal = Date('j');

if($tanggal > 24){
    if(($tanggal == 27) && $sekarang > $pemilihan){
        include('more.php');
    }
    else{
        include('more.php');
    }
}
else{
    echo 'website maintenis :3';
}
?>