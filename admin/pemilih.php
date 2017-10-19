<?php $nav = "pemilih" ?>
<?php require_once "../template/admin-header.php" ?>

<div class="main-data">
<div class="add">
    <h2>Add Data Pemilih</h2>
    <div class="line"></div>
        <p>Search Siswa : </p>
        <input id="search-siswa" name="search" class="input" type="text" list="input-search" onkeyup="getSiswa()">
        <datalist id="input-search">
        </datalist> 
        <button onclick="inputSearchSiswa()" class="button">Input</button>
        <br>
        <br>
        <input id="input-nis" class="input" type="text" disabled placeholder="NIS">
        <input id="input-nama" class="input" type="text" disabled placeholder="Name">
        <input id="input-kelas" class="input" type="text" disabled placeholder="Kelas">
        <input id="input-username" class="input" type="text" placeholder="Username">
        <input id="input-password" class="input" type="text" placeholder="Password">
        <button class="button" onclick="addUsers()">Add</button>
</div>
</div>

<div class="main-data">
<div class="data">
    <h2>Data</h2>
    <div class="line"></div>
    <p>Total Data : <span id="total-data"></span>
    <br>
    <!-- <p>Total Data : 890 | Kelas 10 : 100 | Kelas 11 : 200 | Kelas 12 : 300</p> -->
    <br>                
    <!-- <div class="filter">
        Filter
        <select class="input" name="" id="">
            <option value="">10</option>
            <option value="">20</option>
            <option value="">30</option>
            <option value="">40</option>
            <option value="">50</option>
        </select>
    </div> -->
    <!-- <div class="search">
        <input class="input" type="text" placeholder="search">
        <button class="input">Search</button>
    </div> -->
    <table id="table-data"> 

    </table>
    <!-- <p>Page 1 2 3 4 5 6</p> -->
</div>
</div>
<div id="modal-edit-users" class="modal">
        <div id="modal-content" class="modal-content">
        <h3 class="modal-title">Edit Data<span id="calon-title"></span></h3>
                <span class="button" id="button-close" onclick="onModalEditUsersClose()">&times;</span>
                <form action="" style="clear:both;" class="modal-input-form">
                        <p style="clear : both;">Update Password :</p>
                        <input type="hidden" id="update-nis">                                      
                        <input class="input" type="text" id="update-password">
                </form>
                <button class="button" onclick="updateUsers()">Update Data</button>
        </div>
        </div>
<script>
window.onload = function(){
    tableUsers();
}
</script>
<?php require_once "../template/admin-footer.php" ?>
        