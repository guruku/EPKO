<?php 
require_once ("class/kpko.php");
require_once ("template/header.php");

if($kpko->ceklogin_users() !== true){
  header('location: signin.php');
}

if($kpko->insertsuara_check() !== true){
    header('location: index.php');
}

?>

<div class="terimakasih">
    <h2>Terimakasih</h2>
    <br>
    <p><?php echo $_SESSION['users_username'] ?>, Terimakasih sudah mengikuti Pemilihan Ketua OSIS Berbasis Komputer</p>
    <p>Silahkan <a href="class/logout.php">Logout</a></p>
    <br>
    <small>Anda akan logout dalam <span id="countdown">5</span>..</small>
</div>

<script>

var timeleft = 5;
var downloadTimer = setInterval(function(){
document.getElementById("countdown").innerHTML = --timeleft;
  if(timeleft <= 0){
    clearInterval(downloadTimer);
    location.href = "class/logout.php";
  }
    
},1000);

</script>
<script src="assets/js/main.js"></script>
<?php 
require_once ("template/footer.php");
?>