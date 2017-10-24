// init
var navContent = document.getElementById('nav-content');

var modalProfile = document.getElementById('modal-profile');
var modalConfirm = document.getElementById('modal-confirm');

var modalAlert = document.getElementById('modal-alert');
var alertContent = document.getElementById('alert-content');
var alertTitlte = document.getElementById('alert-title');

var btnCloseModal = document.getElementById('btn-closemodal');

var profileName = document.getElementById('profile-name');
var profileNis = document.getElementById('profile-nis');
var profileKelas = document.getElementById('profile-kelas');
var profileVisi = document.getElementById('profile-visi');
var profileMisi = document.getElementById('profile-misi');


var cNameKetua = document.getElementById('confirm-name-ketua');
var cNisKetua = document.getElementById('confirm-nis-ketua');
var cKelasKetua = document.getElementById('confirm-kelas-ketua');
var cNameWakilKetua = document.getElementById('confirm-name-wakilketua');
var cNisWakilKetua = document.getElementById('confirm-nis-wakilketua');
var cKelasWakilKetua = document.getElementById('confirm-kelas-wakilketua');

var inputToken = document.getElementById('input-token');

//menu

function navMenu(){
    if(navContent.style.display == "block"){
        navContent.style.display = "none";
    }
    else{
        navContent.style.display = "block";
    }
    console.log('test');
}

//  get

function getProfile(calon,nis){
var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        dataProfile = JSON.parse(this.responseText);
        profileName.innerHTML = dataProfile[0].name;
        profileNis.innerHTML = dataProfile[0].nis_siswa;
        profileKelas.innerHTML = dataProfile[0].kelas;
        profileVisi.innerHTML = dataProfile[0].visi;
        profileMisi.innerHTML = dataProfile[0].misi;
    }
};
xmlhttp.open("GET", "class/getprofile.php?nis="+nis+"&calon="+calon, true);
xmlhttp.send();
}

//modal

function showModalProfile(calon,nis){
getProfile(calon,nis);
modalProfile.style.display = "block";

}

function showModalConfirm(nisKetua,nisWakilKetua){
confirmKetua = function(nis){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        cNameKetua.innerHTML = "Loading..";
        cNisKetua.innerHTML = "Loading..";
        cKelasKetua.innerHTML = "Loading..";
        if (this.readyState == 4 && this.status == 200) {
            dataProfile = JSON.parse(this.responseText);
            cNameKetua.innerHTML = dataProfile[0].name;
            cNisKetua.innerHTML = dataProfile[0].nis_siswa;
            cKelasKetua.innerHTML = dataProfile[0].kelas;
        }
    };
    xmlhttp.open("GET", "class/getprofile.php?nis="+nis+"&calon=ketua", true);
    xmlhttp.send();
}

confirmWakilKetua = function(nis){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        cNameWakilKetua.innerHTML = "Loading..";
        cNisWakilKetua.innerHTML = "Loading..";
        cKelasWakilKetua.innerHTML = "Loading..";
        if (this.readyState == 4 && this.status == 200) {
            dataProfile = JSON.parse(this.responseText);
            cNameWakilKetua.innerHTML = dataProfile[0].name;
            cNisWakilKetua.innerHTML = dataProfile[0].nis_siswa;
            cKelasWakilKetua.innerHTML = dataProfile[0].kelas;
        }
    };
    xmlhttp.open("GET", "class/getprofile.php?nis="+nis+"&calon=wakilketua", true);
    xmlhttp.send();
}

confirmKetua(nisKetua.value);
confirmWakilKetua(nisWakilKetua.value);
modalConfirm.style.display = "block";
}

function closeModal(){
modalProfile.style.display = "none";
modalConfirm.style.display = "none";
modalAlert.style.display = "none";
}

function alertModal(){
    modalAlert.style.display = "block";
}

//send

function confirmsend(){
nisKetua = document.querySelector('input[name="ketua"]:checked');
nisWakilKetua = document.querySelector('input[name="wakil-ketua"]:checked');

if(!nisKetua || !nisWakilKetua){
    alertContent.innerHTML = "Gunakan hak suara anda :D";
    alertModal();
}
else{
    showModalConfirm(nisKetua,nisWakilKetua);
}

}

function insertsuara(){

    nisKetua = document.querySelector('input[name="ketua"]:checked');
    nisWakilKetua = document.querySelector('input[name="wakil-ketua"]:checked');

    var param = "nis_ketua="+nisKetua.value+"&nis_wakilketua="+nisWakilKetua.value+"&token="+inputToken.value;
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "class/insertsuara.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        dataJSON = JSON.parse(this.responseText);
        if(dataJSON.status == 'true'){
            alertContent.innerHTML = "Loading.."
            alertModal();
            alertContent.innerHTML = dataJSON.message;
            btnCloseModal.style.display = "none";
            setTimeout(function(){
                location.href = "success.php";
            },1000);
        }
        else{
            alertContent.innerHTML = "Loading.."
            alertModal();
            alertContent.innerHTML = dataJSON.message;
            btnCloseModal.style.display = "none";
            alertModal();
            setTimeout(function(){
                location.href = "signin.php";
            },1000);
        }
      }
    };
    xhttp.send(param);
}

//nav
function about(){
    alertContent.innerHTML = "Copyright 2017 PTIK | JondesCode | Supported By JOSSHOSTING, more info : 082199066627, @haffjjj";
    alertModal();
}