<?php 
require_once ("class/kpko.php");
require_once ("template/header.php");

if($kpko->ceklogin_users() !== true){
    header('location: signin.php');
}

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
                        <h3 class="calon-name">
                        <?php 
                            if (strlen($value['name']) > 15) {
                                echo substr($value['name'],0,14).".";
                            }
                            else{
                                echo $value['name'];
                            }
                        ?>
                        </h3>
                        <button class="button button-profile" id="<?php echo $value['nis_siswa'] ?>" onclick="showModalProfile('ketua',this.id)">profile</button>
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
                        <h3 class="calon-name">
                        <?php 
                            if (strlen($value['name']) > 15) {
                                echo substr($value['name'],0,14).".";
                            }
                            else{
                                echo $value['name'];
                            }
                        ?>
                        </h3>
                        <button class="button button-profile" id="<?php echo $value['nis_siswa'] ?>" onclick="showModalProfile('wakilketua',this.id)">profile</button>
                        <input class="input-radio" type="radio" value="<?php echo $value['nis_siswa'] ?>" name="wakil-ketua">
                    </div>
                    <?php $no++ ?>
                <?php endforeach; ?>
            
                </div>
            </div>
        </div>
        <div class="button-send">
            <button class="button send" onclick="send()">Kirim Suara</button>
        </div>
        </main>

    <div class="modal" id="modal-profile">
        <div class="modal-content">
            <h3 class="modal-title">Profile</h3>
            <span class="button" id="button-close" onclick="closeModal();">&times;</span>
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
            <button class="button confirm-send" id="kirimsuara">Kirim Suara</button>
            <button class="button confirm-cancel" onclick="closeModal();">Batal</button>
        </div>
    </div>

    <script src="assets/js/main.js"></script>

<?php 
require_once ("template/footer.php");
?>
