<?php $nav = "rekapan" ?>
<?php require_once "../template/admin-header.php" ?>

        <div class="main-data">
                <div class="data">
                <h2>Rekapan</h2>
                <div class="line"></div>
                <!-- <table id="table-data" style="margin-top: 10px;"> 
                        <tr>
                                <th>No</th>
                                <th>Users</th>            
                                <th>Ketua</th>
                                <th>Wakil Ketua</th>
                        </tr>
                </table> -->
                <table id="table" class="display" cellspacing="0" width="100%">
                <thead>
                    <tr><th>Users</th><th>Ketua</th><th>Wakil Ketua</th></tr>
                </thead>
                <tbody>
                </tbody>
            </table>
                </div>
        </div>
        
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
        <script type="text/javascript">
            function tableSiswa(){
                $('#table').DataTable({
                    "ajax" : "http://localhost/epko/class/admin/getresult.php",
                    "columns" : [
                        { "data" : "nis_users" },
                        { "data" : "nis_calon_ketua" },
                        { "data" : "nis_calon_wakilketua" }
                        // { mRender : 
                        //     function (data, type, row) {
                        //             return '<button id='+row[0]+' onclick="onModalEditSiswa(\''+row[1]+'\',\''+row[2]+'\',\''+row[3]+'\',\''+row[4]+'\')" class="button">Edit</button> <button onclick="deleteSiswa('+row[0]+')" class="button">Delete</button>'
                        //     }
                        //  }                       
                    ]
                });
            }
            $(document).ready(function(){
                tableSiswa();
            });
        </script>
<!-- <script>
window.onload = function(){
        tableResult();
}
</script> -->

<?php require_once "../template/admin-footer.php" ?>
        