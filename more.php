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

$no = 1;
?>
        <main class="container">
    
        <div class="kpko">
            <div class="ketua">

                <div class="title">
                    <h3>Ketua OSIS</h3>
                    <div class="title-line"></div>
                </div>
                <div class="calons">

                <?php foreach ($calonketua as $value): ?>
                    <div class="calon">
                        <div class="calon-no"><?php echo $no ?></div>
                        <div style=" background-image: url('assets/img/calon/1.jpg');" class="calon-img"></div>
                        <h4 class="calon-name">
                        <?php 
                            if (strlen($value['name']) > 14) {
                                echo substr($value['name'],0,13).".";
                            }
                            else{
                                echo $value['name'];
                            }
                        ?>
                        </h4>
                        <button class="button btn-grass" id="<?php echo $value['nis_siswa'] ?>" onclick="showModalProfile('ketua',this.id)">Profile</button>
                        <input class="input-radio" type="radio" value="<?php echo $value['nis_siswa'] ?>" name="ketua">
                    </div>
                    <?php $no++ ?>
                <?php endforeach; ?>

                </div>
            </div>

            <div class="wakil-ketua">

                <div class="title">
                    <h3>Wakil Ketua OSIS</h3>
                    <div class="title-line"></div>
                </div>

                <div class="calons">

                <?php $no = 1 ?>
                <?php foreach ($calonwakilketua as $value): ?>
                    <div class="calon">
                        <div class="calon-no"><?php echo $no ?></div>
                        <div style=" background-image: url('assets/img/calon/1.jpg');" class="calon-img"></div>
                        <h4 class="calon-name">
                        <?php 
                            if (strlen($value['name']) > 14) {
                                echo substr($value['name'],0,13).".";
                            }
                            else{
                                echo $value['name'];
                            }
                        ?>
                        </h4>
                        <button class="button btn-grass" id="<?php echo $value['nis_siswa'] ?>" onclick="showModalProfile('wakilketua',this.id)">Profile</button>
                        <input class="input-radio" type="radio" value="<?php echo $value['nis_siswa'] ?>" name="wakil-ketua">
                    </div>
                    <?php $no++ ?>
                <?php endforeach; ?>
            
                </div>
            </div>
        </div>
        <div class="button-send">
            <button class="button btn-aqua" onclick="confirmsend()">Kirim Suara</button>
        </div>
        </main>

    <div class="modal" id="modal-profile">
        <div class="modal-content">
            <h3 class="modal-title">Profile</h3>
            <table class="modal-table">
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td id="profile-name">Loading..</td>
                </tr>
                <tr>
                    <td>NIS</td>
                    <td>:</td>
                    <td id="profile-nis">Loading..</td>
                </tr>
                <tr>
                    <td>Kelas</td>
                    <td>:</td>
                    <td id="profile-kelas">Loading..</td>
                </tr>
                <tr>
                    <td>Visi</td>
                    <td>:</td>
                    <td id="profile-visi">Loading..</td>
                </tr>
                <tr>
                    <td>MIsi</td>
                    <td>:</td>
                    <td id="profile-misi">Loading..</td>
                </tr>
                
            </table>
            <button class="button confirm-cancel btn-bitter" onclick="closeModal();">Close</button>            
        </div>
    </div>

    <div class="modal" id="modal-confirm">
        <div class="modal-content" id="confirm-content">
            <h3 class="confirm-title">Apakah anda yakin?</h3>
            <h4>Ketua</h4>
            <table class="modal-table">
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td id="confirm-name-ketua">Loading..</td>
                </tr>
                <tr>
                    <td>NIS</td>
                    <td>:</td>
                    <td id="confirm-nis-ketua">Loading..</td>
                </tr>
                <tr>
                    <td>Kelas</td>
                    <td>:</td>
                    <td id="confirm-kelas-ketua">Loading..</td>
                </tr>
            </table>
            <br>
            <h4>Wakil Ketua</h4>
            <table class="modal-table">
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td id="confirm-name-wakilketua">Loading..</td>
                </tr>
                <tr>
                    <td>NIS</td>
                    <td>:</td>
                    <td id="confirm-nis-wakilketua">Loading..</td>
                </tr>
                <tr>
                    <td>Kelas</td>
                    <td>:</td>
                    <td id="confirm-kelas-wakilketua">Loading..</td>
                </tr>
            </table>
            <br>
            <input type="hidden" id="input-token" value="<?php echo $token ?>">
            <button class="button confirm-send btn-aqua" id="kirimsuara" onclick="insertsuara()">Kirim Suara</button>
            <button class="button confirm-cancel btn-bitter" onclick="closeModal();">Batal</button>
        </div>
    </div>
    <div class="modal" id="modal-alert">
        <div class="modal-content" id="">
            <h3 class="modal-title" id="alert-title">Alert</h3>
            <p id="alert-content"></p>
            <button id="btn-closemodal" class="button confirm-cancel btn-bitter" onclick="closeModal();">Ok</button>
        </div>
    </div>
    <script src="assets/js/mainh.js"></script>

<?php 
require_once ("template/footer.php");
ob_flush();
?>
