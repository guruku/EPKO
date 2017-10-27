<?php $nav = "siswa" ?>
<?php require_once "../template/admin-header.php" ?>

        <div class="main-data">
            <div class="add">
                <h2>Add Data Siswa</h2>
                <div class="line"></div>
                    <input id="input-nis" class="input" type="text" placeholder="nis">
                    <input id="input-nama" class="input" type="text" placeholder="name">
                    <select id="input-kelas" class="input" name="kelas">
                        <option value="X">X</option>
                        <option value="XI">XI</option>
                        <option value="XII">XII</option>
                    </select>
                    <select id="input-jurusan" class="input" name="jurusan">
                        <option value="RPL">RPL</option>
                        <option value="TKJ">TKJ</option>
                        <option value="TJA">TJA</option>
                    </select>
                    <select id="input-kelaske" class="input" name="kelaske">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                    <select id="input-gender" class="input" name="gender">
                        <option value="10">L</option>
                        <option value="11">P</option>
                    </select>
                    <button class="button" onclick="addSiswa()">Add</button>
            </div>
        </div>

        <div class="main-data" >
            <div class="data">
                <h2>Data</h2>
                <div class="line"></div>
                <!-- <p>Total Data : <span id="total-data"></span>
            </p>
                <br>                 -->

            <table id="table" class="display" cellspacing="0" width="100%">
                <thead>
                    <tr><th>NIS</th><th>NAMA</th><th>GENDER</th><th>KELAS</th><th>ACTION</th></tr>
                </thead>
                <tbody>
                </tbody>
            </table>
            <span id="page-content"></span>                                
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
                        <p>Gender :</p>                        
                        <input class="input" type="text" id="update-gender">
                        <p>Kelas :</p>                        
                        <input class="input" type="text" id="update-kelas">
                </form>
                <button class="button" onclick="updateSiswa()">Update Data</button>
        </div>
        </div>

        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
        <script type="text/javascript">
            function tableSiswa(){
                $('#table').DataTable({
                    "ajax" : "http://localhost/epko/class/admin/getsiswa.php",
                    "columns" : [
                        { "data" : "nis" },
                        { "data" : "name" },
                        { "data" : "gender" },
                        { "data" : "kelas" },
                        { mRender : 
                            function (data, type, row) {
                                    return '<button id='+row[0]+' onclick="onModalEditSiswa(\''+row[1]+'\',\''+row[2]+'\',\''+row[3]+'\',\''+row[4]+'\')" class="button">Edit</button> <button onclick="deleteSiswa('+row[0]+')" class="button">Delete</button>'
                            }
                         }                       
                    ]
                });
            }
            $(document).ready(function(){
                tableSiswa();
            });
        </script>

        <!-- <script>
        window.onload = function(){
            tableSiswa(6);
            getrowstable('siswa');
        }
        </script> -->
<?php require_once "../template/admin-footer.php" ?>
        