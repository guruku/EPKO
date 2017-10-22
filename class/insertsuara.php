<?php
require_once ("kpko.php");
if(isset($_POST['nis_ketua'])){
    $nis_ketua = $_POST['nis_ketua'];
    $nis_wakilketua = $_POST['nis_wakilketua'];
    $token = $_POST['token'];

    if($token == $_SESSION['token']){
        if($kpko->insertsuara($nis_ketua,$nis_wakilketua) == true){
            $status = ['status'=>'true','message'=>'Sukses!..'];
        }
    
        else{
            $status = ['status'=>'false','message'=>'Gagal!, sistem mengalami masalah :('];
        }
    }
    else{
        $status = ['status'=>'false','message'=>'Gagal! token expired, merefresh halaman'];
    }

    
    echo json_encode($status,true);
}
else{
    echo "YOOLOOO :3";
}

?>