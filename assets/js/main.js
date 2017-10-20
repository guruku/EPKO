// init
var modalProfile = document.getElementById('modal-profile');
var modalConfirm = document.getElementById('modal-confirm');


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
}

//send

function send(){
nisKetua = document.querySelector('input[name="ketua"]:checked');
nisWakilKetua = document.querySelector('input[name="wakil-ketua"]:checked');

if(!nisKetua || !nisWakilKetua){
    alert('Mohon gunakan hak pilih anda :D');
}
else{
    showModalConfirm(nisKetua,nisWakilKetua);        
}

}
