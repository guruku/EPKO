<?php $nav = "calon" ?>
<?php require_once "../template/admin-header.php" ?>

<div class="main-data">
<div class="add">
    <h2>Add Calon</h2>
    <div class="line"></div>
        <select class="input" name="" id="calon-value">
                <option value="ketua">Ketua</option>
                <option value="wakilketua">Wakil Ketua</option>
        </select>
        <button class="button" onclick="onModalCalon('show')">Input</button>
</div>
</div>

<div class="main-data">
<div class="data">
    <h2>Data Calon Ketua</h2>
    <div class="line"></div>
    <table id="table-data-ketua" style="margin-top: 10px;"> 
    <tr>
            <th>Urut</th>
            <th>Image</th>            
            <th>NIS</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Visi</th>
            <th>Misi</th>
            <th>Action</th>
    </tr>
    </table>
</div>
</div>


<div class="main-data">
<div class="data">
    <h2>Data Calon Wakil Ketua</h2>
    <div class="line"></div>
    <table id="table-data-wakilketua" style="margin-top: 10px;"> 
        <tr>
            <th>Urut</th>
            <th>Image</th>            
            <th>NIS</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Visi</th>
            <th>Misi</th>
            <th>Action</th>
        </tr>
    </table>
</div>
</div>

</div>
</div>

<div id="modal-input" class="modal">
        <div id="modal-content" class="modal-content">
        <h3 class="modal-title" id="modal-title">Input calon <span class="input-calon"></span></h3>
                <span class="button" id="button-close" onclick="onModalCalon('close');">&times;</span>
                <p style="clear : both;">Search Siswa :</p>
                        <input id="search-siswa" name="search" style="display:inline-block" class="input" type="text" list="input-search" onkeyup="getSiswa()">
                        <datalist id="input-search">
                        </datalist>           
                        <button class="button" type="text" onclick="inputSearchSiswa()">Input</button>
                    <form action="../class/admin/insertcalon.php" method="POST" enctype="multipart/form-data">
                        <!-- <p style="clear : both;">NIS :</p>           -->
                        <input name="calon" type="hidden" class="input-calon" value="">           
                        <input name="nis" class="input" type="hidden" id="input-nis">
                        <p style="clear : both;">Nama :</p>                        
                        <input class="input" type="text" disabled id="input-nama">
                        <p>Gender :</p>       
                        <input class="input" type="text" disabled id="input-gender">
                        <p>Kelas :</p>       
                        <input class="input" type="text" disabled id="input-kelas">
                        <p style="clear : both;">Photo :</p>
                        <input name="imgpath" class="input" type="file" placeholder="" id="input-imgpath">
                        <p>Visi :</p>
                        <textarea name="visi" class="input" cols="30" rows="10" id="input-visi"></textarea>
                        <p>Misi :</p>
                        <textarea name="misi" class="input" cols="30" rows="10" id="input-misi"></textarea>
                        <button class="button" type="submit">Add</button>
                    </form>
        </div>
</div>
<div id="modal-input-update" class="modal">
        <div id="modal-content" class="modal-content">
        <h3 class="modal-title" id="modal-title">Edit data <span class="input-calon"></span></h3>
                <span class="button" id="button-close" onclick="onModalCalon('close');">&times;</span>
                    <form action="../class/admin/updatecalon.php" method="POST" enctype="multipart/form-data">
                        <!-- <p style="clear : both;">NIS :</p>           -->
                        <input name="calon" type="hidden" class="input-calon" value="">           
                        <input name="nis" class="input" type="hidden" id="update-nis">
                        <!-- <p style="clear : both;">Nama :</p>                        
                        <input class="input" type="text" disabled id="update-nama">
                        <p>Gender :</p>       
                        <input class="input" type="text" disabled id="update-gender">
                        <p>Kelas :</p>       
                        <input class="input" type="text" disabled id="update-kelas"> -->
                        <p style="clear : both;">Photo :</p>
                        <input name="imgpath" class="input" type="file" placeholder="" id="input-imgpath">
                        <p>Visi :</p>
                        <textarea name="visi" class="input" cols="30" rows="10" id="update-visi"></textarea>
                        <p>Misi :</p>
                        <textarea name="misi" class="input" cols="30" rows="10" id="update-misi"></textarea>
                        <button class="button" type="submit">Update Data</button>
                    </form>
        </div>
</div>
<script>
    window.onload = function(){
        tableCalonKetua();
        tableCalonWakilKetua();
    }
</script>
<?php require_once "../template/admin-footer.php" ?>
        