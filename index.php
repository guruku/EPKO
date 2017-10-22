<?php 
ob_start();
require_once ("class/kpko.php");
require_once ("template/header.php");

if($kpko->ceklogin_users() !== true){
    header('location: signin.php');
}

if($kpko->insertsuara_check() == true){
    header('location: success.php');
}

$token = $kpko->gettoken();

$calonketua = $kpko->getcalon("ketua");
$calonwakilketua = $kpko->getcalon("wakilketua");

$users = $kpko->getsiswa($_SESSION['users_nis']);

$no = 1;
?>  
    <div id="pre" class="container">
        <h2>Selamat Datang, <?php echo $_SESSION['users_username'] ?></h2>
        <p>Konfirmasi data : </p>
        <table>
            <tr>
                <td>Username</td>
                <td>:</td>
                <td><?php echo $_SESSION['users_username'] ?></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><?php echo $users[0]['name'] ?></td>
            </tr>
            <tr>
                <td>NIS</td>
                <td>:</td>
                <td><?php echo $users[0]['nis'] ?></td>
            </tr>
            <tr>
                <td>Kelas</td>
                <td>:</td>
                <td><?php echo $users[0]['kelas'] ?></td>
            </tr>
        </table>
        <p>Jika data tidak sesuai harap hubungi panitia.</p>
        <p>CP : 082199066627 WA (joundy)</p>
        <p>Pemilihan ketua dan wakil ketua osis akan dilaksanakan pada hari jum'at tanggal 27 Oktober 2017, info lebih lanjut hubungi panitia.</p>
    </div>

    <div class="modal" id="modal-alert">
        <div class="modal-content" id="">
            <h3 class="modal-title" id="alert-title">Alert</h3>
            <p id="alert-content"></p>
            <button id="btn-closemodal" class="button confirm-cancel btn-bitter" onclick="closeModal();">Ok</button>
        </div>
    </div>
    <script src="assets/js/main.js"></script>

<?php 
require_once ("template/footer.php");
ob_flush();
?>
