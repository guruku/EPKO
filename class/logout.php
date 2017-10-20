<?php 
require_once ("kpko.php");
$kpko->logout();
header("location: ../signin.php");
?>