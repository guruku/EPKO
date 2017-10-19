<?php $nav = "rekapan" ?>
<?php require_once "../template/admin-header.php" ?>

        <div class="main-data">
                <div class="data">
                <h2>Rekapan</h2>
                <div class="line"></div>
                <table id="table-data" style="margin-top: 10px;"> 
                        <tr>
                                <th>No</th>
                                <th>Users</th>            
                                <th>Ketua</th>
                                <th>Wakil Ketua</th>
                        </tr>
                </table>
                </div>
        </div>
<script>
window.onload = function(){
        tableResult();
}
</script>

<?php require_once "../template/admin-footer.php" ?>
        