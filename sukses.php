<?php 
require_once ("class/kpko.php");
require_once ("template/header.php");
?>

<div class="terimakasih">
    <h2>Sukses</h2>
    <br>
    <p>Username, Terimakasih sudah mengikuti Pemilihan Ketua OSIS Berbasis Komputer</p>
    <p>Silahkan <a href="">Logout</a></p>
    <br>
    <small>Anda akan logout dalam <span id="countdown">5</span>..</small>
</div>

<script>

var timeleft = 5;
var downloadTimer = setInterval(function(){
document.getElementById("countdown").innerHTML = --timeleft;
  if(timeleft <= 0){
    clearInterval(downloadTimer);
    // alert("Anda telah logout");
  }
    
},1000);

</script>

<?php 
require_once ("template/footer.php");
?>