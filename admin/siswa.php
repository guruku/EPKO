<?php $nav = "siswa" ?>
<?php require_once "../template/admin-header.php" ?>

        <div class="main-data">
            <div class="add">
                <h2>Add Data Siswa</h2>
                <div class="line"></div>
                    <input id="input-nis" class="input" type="text" placeholder="nis">
                    <input id="input-nama" class="input" type="text" placeholder="name">
                    <select id="input-kelas" class="input" name="kelas">
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                    </select>
                    <button class="button" onclick="addSiswa()">Add</button>
            </div>
        </div>

        <div class="main-data" >
            <div class="data">
                <h2>Data</h2>
                <div class="line"></div>
                <p>Total Data : <span id="total-data"></span>
            </p>
                <br>                
            <table class="" id="table-data">

            </table>
            </div>
        </div>

        <div id="modal-edit-siswa" class="modal">
        <div id="modal-content" class="modal-content">
        <h3 class="modal-title">Edit Data<span id="calon-title"></span></h3>
                <span class="button" id="button-close" onclick="onModalEditSiswaClose()">&times;</span>
                <form action="" style="clear:both;" class="modal-input-form">
                        <p style="clear : both;">NIS :</p>                        
                        <input class="input" type="text" id="update-nis" disabled>
                        <p>Nama :</p>                        
                        <input class="input" type="text" id="update-nama">
                        <p>Kelas :</p>                        
                        <input class="input" type="text" id="update-kelas">
                </form>
                <button class="button" onclick="updateSiswa()">Update Data</button>
        </div>
        </div>
        <script>
        window.onload = function(){
            tableSiswa();
        }
        </script>
<?php require_once "../template/admin-footer.php" ?>
        