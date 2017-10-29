<?php 
if($admin->ceklogin_admin() == false){
    header("location:signin.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Page</title>
    <link rel="stylesheet" href="../assets/css/admin.css">
</head>
<body>
    <header>
        <div class="title">
            <h2>EKPO</h2>
        </div>
        <div class="">
            <div class="username">
                <p onclick="location.href='../class/admin/signout.php'">Sign Out</p>
            </div>
            <div class="signout">
                <p>Hello, <?php echo $_SESSION['admin_username'] ?></p>
            </div>
        </div>
    </header>
    <nav>
        <ul>
            <li class="<?php echo ($nav == 'dashboard' ? 'active' : '')?>" onclick="location.href='index.php';">Dashboard</li>
            <li class="parent">Manage</li>
            <ul class="nav-child">
                <li class="<?php echo ($nav == 'siswa' ? 'active' : '')?>" onclick="location.href='siswa.php';">Siswa</li>
                <li class="<?php echo ($nav == 'pemilih' ? 'active' : '')?>" onclick="location.href='pemilih.php';">Pemilih</li>
                <li class="<?php echo ($nav == 'calon' ? 'active' : '')?>" onclick="location.href='calon.php';">Calon</li>
                <li class="<?php echo ($nav == 'rekapan' ? 'active' : '')?>" onclick="location.href='rekapan.php';">Rekapan</li>
            </ul>
        </ul>
    </nav>
    <main>