// INIT

// modal
var modalEditSiswa =  document.getElementById('modal-edit-siswa');
var modalEditUsers =  document.getElementById('modal-edit-users');
var modalCalon = document.getElementById('modal-input');

var calonValue = document.getElementById('calon-value');

var searchSsiswa = document.getElementById('search-siswa');
var dataListSiswa = document.getElementById('input-search');

// input
var inputNis = document.getElementById('input-nis');
var inputNama = document.getElementById('input-nama');
var inputKelas = document.getElementById('input-kelas');

var inputVisi = document.getElementById('input-visi');
var inputMisi = document.getElementById('input-misi');
var inputImgpath = document.getElementById('input-imgpath');

var inputUsername = document.getElementById('input-username');
var inputPassword = document.getElementById('input-password');

var inputCalon = document.getElementsByClassName('input-calon');

// table
var totalData = document.getElementById('total-data');
var tableData = document.getElementById('table-data');
var tableDataKetua = document.getElementById('table-data-ketua');
var tableDataWakilKetua = document.getElementById('table-data-wakilketua');

//update
var updateNis = document.getElementById('update-nis');;
var updateNama = document.getElementById('update-nama');;
var updateKelas = document.getElementById('update-kelas'); 

var updatePassword = document.getElementById('update-password'); 

//end INIT

//modal

function onModalEditSiswa(nis,name,kelas){
    updateNis.value = nis;
    updateNama.value = name;
    updateKelas.value = kelas;
    modalEditSiswa.style.display = "block";
}

function onModalEditSiswaClose(){
    modalEditSiswa.style.display = "none";
}


function onModalEditUsers(nis){
    updateNis.value = nis;
    modalEditUsers.style.display = "block";
}
function onModalEditUsersClose(){
    modalEditUsers.style.display = "none";
}

function onModalCalon(action){ 
    if(action == 'show'){
        modalCalon.style.display = 'block';
        inputCalon[0].innerHTML = calonValue.value;
        inputCalon[1].value = calonValue.value;
    }
    else if(action == 'close'){
        modalCalon.style.display = 'none';
    }   
}

// insert

function addSiswa(){
    var param = "nis="+ inputNis.value +"&name="+ inputNama.value +"&kelas="+ inputKelas.value;
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "../class/admin/insertsiswa.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        dataJSON = JSON.parse(this.responseText);
        if(dataJSON.status == "true"){
            alert('Data Berhasil di tambahkan');
        }
        else{
            alert(dataJSON.message);            
        }
        tableSiswa();
      }
    };
    xhttp.send(param);
}

function addUsers(){
    var param = "nis="+ inputNis.value +"&username="+ inputUsername.value +"&pass="+ inputPassword.value;
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "../class/admin/insertusers.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        dataJSON = JSON.parse(this.responseText);
        if(dataJSON.status == "true"){
            alert('Data Berhasil di tambahkan');
        }
        else{
            alert(dataJSON.message);            
        }
        tableUsers();
      }
    };
    xhttp.send(param);
}

function addCalon(){
    var param = "calon="+inputCalon[1].value+"&nis="+inputNis.value+"&visi="+inputVisi.value+"&misi="+inputMisi.value+"&imgpath="+inputImgpath.value;
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "../class/admin/insertcalon.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        dataJSON = JSON.parse(this.responseText);
        if(dataJSON.status == "true"){
            alert('Data Berhasil di tambahkan');
        }
        else{
            alert(dataJSON.message);            
        }
        tableCalonKetua();
        tableCalonWakilKetua();
      }
    };
    xhttp.send(param);
}


// delete

function deleteSiswa(id){
    var confr = confirm('Apakah anda yakin?');
    if (confr == true) {
        var param = "id="+id;
        var xhttp = new XMLHttpRequest();
        xhttp.open("POST", "../class/admin/deletesiswa.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            dataJSON = JSON.parse(this.responseText);
            if(dataJSON.status == "true"){
                alert('Data Berhasil di hapus');
                onModalEditSiswaClose();
            }
            else{
                alert(dataJSON.message);            
            }
            tableSiswa();
          }
        };
        xhttp.send(param);
    }
}

function deleteUsers(id){
    var confr = confirm('Apakah anda yakin?');
    if (confr == true) {
        var param = "id="+id;
        var xhttp = new XMLHttpRequest();
        xhttp.open("POST", "../class/admin/deleteusers.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            dataJSON = JSON.parse(this.responseText);
            if(dataJSON.status == "true"){
                alert('Data Berhasil di hapus');
            }
            else{
                alert(dataJSON.message);            
            }
            tableUsers();
          }
        };
        xhttp.send(param);
    }
}

function deleteCalon(calon,id){
    var confr = confirm('Apakah anda yakin?');
    if (confr == true) {
        var param = "id="+id+"&calon="+calon;
        var xhttp = new XMLHttpRequest();
        xhttp.open("POST", "../class/admin/deletecalon.php?calon="+calon, true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            dataJSON = JSON.parse(this.responseText);
            if(dataJSON.status == "true"){
                alert('Data Berhasil di hapus');
            }
            else{
                alert(dataJSON.message);            
            }
            tableCalonKetua();
            tableCalonWakilKetua();
          }
        };
        xhttp.send(param);
    }
}
// update

function updateSiswa(){
    var param = "name="+ updateNama.value +"&kelas="+ updateKelas.value+"&nis="+ updateNis.value;
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "../class/admin/updatesiswa.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        dataJSON = JSON.parse(this.responseText);
        if(dataJSON.status == "true"){
            alert('Data Berhasil di Update');
        }
        else{
            alert(dataJSON.message);            
        }
        tableSiswa();
      }
    };
    xhttp.send(param);
}

function updateUsers(){
    var param = "password="+ updatePassword.value +"&nis="+ updateNis.value;
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "../class/admin/updateusers.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        dataJSON = JSON.parse(this.responseText);
        if(dataJSON.status == "true"){
            alert('Data Berhasil di Update');
        }
        else{
            alert(dataJSON.message);            
        }
        tableUsers();
      }
    };
    xhttp.send(param);
}

// get

function getSiswa(){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            dataSiswa = JSON.parse(this.responseText);
            dataListSiswa.innerHTML = "";
            if (dataSiswa.length > 0){
                for (var index = 0; index < dataSiswa.length; index++) {
                    dataListSiswa.innerHTML += '<option value='+ dataSiswa[index].nis +'>'+ dataSiswa[index].name +'</option>';
                }
            }
            else{
                dataListSiswa.innerHTML = '<option value="siswa tidak ada">'+searchSsiswa.value+'</option>';
            }
        }
    };
    xmlhttp.open("GET", "../class/admin/getsiswa.php?search=" + searchSsiswa.value, true);
    xmlhttp.send();
}


function inputSearchSiswa(){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            dataSiswa = JSON.parse(this.responseText);
            dataListSiswa.innerHTML = "";
            if (dataSiswa.length > 0){
                inputNis.value = dataSiswa[0].nis;
                inputNama.value = dataSiswa[0].name;
                inputKelas.value = dataSiswa[0].kelas;
            }
            else{
                inputNis.value = 'no data';
                inputNama.value = 'no data';
                inputKelas.value = 'no data';
            }
        }
    };
    xmlhttp.open("GET", "../class/admin/getsiswa.php?search=" + searchSsiswa.value, true);
    xmlhttp.send();
}


// table
function tableSiswa(){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            dataSiswa = JSON.parse(this.responseText);
            tableData.innerHTML = "<tr><th>No</th><th>NIS</th><th>Nama</th><th>Kelas</th><th>Action</th></tr>";
            var no = 1;
            if (dataSiswa.length > 0){
                for (var index = 0; index < dataSiswa.length; index++) {
                    tableData.innerHTML += '<tr><td>'+no+'</td><td>'+dataSiswa[index].nis+'</td><td>'+dataSiswa[index].name+'</td><td>'+dataSiswa[index].kelas+'</td><td><span onclick="onModalEditSiswa('+dataSiswa[index].nis+',\''+dataSiswa[index].name+'\','+dataSiswa[index].kelas+')" class="link">Edit</span> / <span class="link tx-red" id="'+dataSiswa[index].id+'" onclick="deleteSiswa(this.id)">Delete</span></td></tr>';
                    no++;
                }
                totalData.innerHTML = dataSiswa.length;
                return true;
            }
            else{
            }
        }
    };
    xmlhttp.open("GET", "../class/admin/getsiswa.php", true);
    xmlhttp.send();
}

function tableUsers(){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            dataUsers = JSON.parse(this.responseText);
            tableData.innerHTML = "<tr><th>No</th><th>NIS</th><th>Nama</th><th>Kelas</th><th>Username</th><th>Password</th><th>Action</th></tr>";
            var no = 1;
            if (dataUsers.length > 0){
                for (var index = 0; index < dataUsers.length; index++) {
                    tableData.innerHTML += '<tr><td>'+no+'</td><td>'+dataUsers[index].nis_siswa+'</td><td>'+dataUsers[index].name+'</td><td>'+dataUsers[index].kelas+'</td><td>'+dataUsers[index].username+'</td><td>***</td><td><span class="link" onclick="onModalEditUsers(\''+dataUsers[index].nis_siswa+'\')">Edit</span> / <span id="'+dataUsers[index].id+'" onclick="deleteUsers(this.id)" class="link tx-red">Delete</span></td></tr>';
                    no++;
                }
                totalData.innerHTML = dataUsers.length;
                return true;
            }
            else{
            }
        }
    };
    xmlhttp.open("GET", "../class/admin/getusers.php", true);
    xmlhttp.send();
}

function tableCalonKetua(){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            dataCalon = JSON.parse(this.responseText);
            tableDataKetua.innerHTML = "<tr><th>Urut</th><th>Image</th><th>NIS</th><th>Nama</th><th>Kelas</th><th>Visi</th><th>Misi</th><th>Action</th></tr>";
            var no = 1;
            if (dataCalon.length > 0){
                for (var index = 0; index < dataCalon.length; index++) {
                    tableDataKetua.innerHTML += "<tr><td>"+no+"</td><td>"+dataCalon[index].imgpath+"</td><td>"+dataCalon[index].nis_siswa+"</td><td>"+dataCalon[index].name+"</td><td>"+dataCalon[index].kelas+"</td><td>"+dataCalon[index].visi+"</td><td>"+dataCalon[index].misi+"</td><td><span class='link' onclick=''>Edit</span> / <span id='"+dataCalon[index].id+"' onclick='deleteCalon(\"calon_ketua\",this.id)' class='link tx-red'>Delete</span></td></tr>";
                    no++;
                }
                // totalData.innerHTML = dataUsers.length;
                return true;
            }
            else{
            }
        }
    };
    xmlhttp.open("GET", "../class/admin/getcalon.php?calon=ketua", true);
    xmlhttp.send();
}

function tableCalonWakilKetua(){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            dataCalon = JSON.parse(this.responseText);
            tableDataWakilKetua.innerHTML = "<tr><th>Urut</th><th>Image</th><th>NIS</th><th>Nama</th><th>Kelas</th><th>Visi</th><th>Misi</th><th>Action</th></tr>";
            var no = 1;
            if (dataCalon.length > 0){
                for (var index = 0; index < dataCalon.length; index++) {
                    tableDataWakilKetua.innerHTML += "<tr><td>"+no+"</td><td>"+dataCalon[index].imgpath+"</td><td>"+dataCalon[index].nis_siswa+"</td><td>"+dataCalon[index].name+"</td><td>"+dataCalon[index].kelas+"</td><td>"+dataCalon[index].visi+"</td><td>"+dataCalon[index].misi+"</td><td><span class='link' onclick=''>Edit</span> / <span id='"+dataCalon[index].id+"' onclick='deleteCalon(\"calon_wakilketua\",this.id)' class='link tx-red'>Delete</span></td></tr>";
                    no++;
                }
                // totalData.innerHTML = dataUsers.length;
                return true;
            }
            else{
            }
        }
    };
    xmlhttp.open("GET", "../class/admin/getcalon.php?calon=wakilketua", true);
    xmlhttp.send();
}

function tableResult(){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            dataResult = JSON.parse(this.responseText);
            tableData.innerHTML = "<tr><th>No</th><th>Users</th><th>Ketua</th><th>Wakil Ketua</th></tr>";
            var no = 1;
            if (dataResult.length > 0){
                for (var index = 0; index < dataResult.length; index++) {
                    tableData.innerHTML += '<tr><td>'+no+'</td><td>'+dataResult[index].nis_users+'</td><td>'+dataResult[index].nis_calon_ketua+'</td><td>'+dataResult[index].nis_calon_wakilketua+'</td></tr>';
                    no++;
                }
                totalData.innerHTML = dataResult.length;
                return true;
            }
            else{
            }
        }
    };
    xmlhttp.open("GET", "../class/admin/getresult.php", true);
    xmlhttp.send();
}