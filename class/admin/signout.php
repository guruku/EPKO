<?php
require_once __DIR__ ."/admin.php";
$admin->signout();
header("location:http://localhost/epko/admin/signin.php");
?>