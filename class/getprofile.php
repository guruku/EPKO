<?php
require_once ("kpko.php");

if (isset($_GET['nis'])) {
    $nis = $_GET['nis'];
    $calon = $_GET['calon'];
    $profile = $kpko->getprofile($calon,$nis);
    echo json_encode($profile,true);
}
?>