<?php $nav = "dashboard" ?>
<?php require_once "../template/admin-header.php" ?>

        <div class="main-data">
                <h2>Dashboard</h2>
                <div class="line"></div>

                <!-- <div id="chartContainer" style="height: 370px; width: 50%;"></div> -->

                <div id="das-ketua">
                </div>
                <br>
                <div id="das-wakilketua">
                </div>

                <br>



                <h4 >Jumlah Siswa : <span id="das-jumsiswa">..</span></h4>
                <br>
                <div class="dashboard-result">
                        <p>Sudah Register : <b id="das-register">..</b> </p>
                        <p>Belum Register : <b id="das-blumregister">..</b> </p>
                        <p>Sudah Memilih : <b  id="das-memilih">..</b> </p>
                        <p>Belum Memilih : <b id="das-blummemilih">..</b> </p>
                </div>
                


        </div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script>

window.onload = function() {
// piechart();
dashboardResult()
setInterval(function(){ 
        // piechart();
        dashboardResult(); 
}, 2000);
}
</script>
<?php require_once "../template/admin-footer.php" ?>
        