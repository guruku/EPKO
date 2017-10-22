<?php
require_once ("kpko.php");

if (isset($_GET['nis'])) {
    $nis = $_GET['nis'];
    // var_dump($kpko->getsiswa($nis));
    if($kpko->getsiswa($nis) == true){
        echo json_encode($kpko->getsiswa($nis),true);
    }
    else{
        echo "[]";
    }
}
?>