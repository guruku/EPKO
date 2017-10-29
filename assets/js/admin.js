// INIT

// modal
var modalEditSiswa =  document.getElementById('modal-edit-siswa');
var modalEditUsers =  document.getElementById('modal-edit-users');
var modalCalon = document.getElementById('modal-input');
var modalCalonUpdate = document.getElementById('modal-input-update');

var calonValue = document.getElementById('calon-value');

var searchSsiswa = document.getElementById('search-siswa');
var dataListSiswa = document.getElementById('input-search');

// input
var inputNis = document.getElementById('input-nis');
var inputNama = document.getElementById('input-nama');
var inputKelas = document.getElementById('input-kelas');
var inputJurusan = document.getElementById('input-jurusan');
var inputKelaske = document.getElementById('input-kelaske');
var inputGender = document.getElementById('input-gender');

var inputVisi = document.getElementById('input-visi');
var inputMisi = document.getElementById('input-misi');
// var inputImgpath = document.getElementById('input-imgpath');

var inputUsername = document.getElementById('input-username');
var inputPassword = document.getElementById('input-password');

var inputCalon = document.getElementsByClassName('input-calon');

// table
var totalData = document.getElementById('total-data');
var tableData = document.getElementById('table-data');
var tableDataKetua = document.getElementById('table-data-ketua');
var tableDataWakilKetua = document.getElementById('table-data-wakilketua');

//update
var updateNis = document.getElementById('update-nis');
var updateNama = document.getElementById('update-nama');
var updateGender = document.getElementById('update-gender');
var updateKelas = document.getElementById('update-kelas'); 
var updateVisi = document.getElementById('update-visi'); 
var updateMisi = document.getElementById('update-misi'); 

var updatePassword = document.getElementById('update-password'); 

var pageContent = document.getElementById('page-content');

var dasKetua = document.getElementById('das-ketua');
var dasWakilKetua = document.getElementById('das-wakilketua');
//end INIT

//modal

function onModalEditSiswa(nis,name,gender,kelas){
    updateNis.value = nis;
    updateNama.value = name;
    updateGender.value = gender;
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
function onModalEditUsersClose(calon){   
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
        modalCalonUpdate.style.display = "none";
    }   
}

function onModalEditCalon(nis,calon,visi,misi){
    inputCalon[2].innerHTML = nis;
    inputCalon[3].value = calon; 
    // updateNama.value = nama;
    // updateGender.value = gender;
    // updateKelas.value = kelas;
    updateNis.value = nis;
    updateVisi.value = visi;
    updateMisi.value = misi;
    modalCalonUpdate.style.display = "block";
}

// insert

function addSiswa(){
    var param = "nis="+ inputNis.value +"&name="+ inputNama.value +"&kelas="+ inputKelas.value +" "+inputJurusan.value +" "+inputKelaske.value +"&gender="+ inputGender.value;
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "../class/admin/insertsiswa.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        dataJSON = JSON.parse(this.responseText);
        if(dataJSON.status == true){
            alert(dataJSON.message);                        
            // alert('Data Berhasil di tambahkan');
            location.reload();
        }
        else{
            alert(dataJSON.message);            
        }
        // tableSiswa();
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
        if(dataJSON.status == true){
            alert(dataJSON.message);    
            location.reload();            
            // alert('Data Berhasil di tambahkan');
        }
        else{
            alert(dataJSON.message);            
        }
        // tableUsers();
      }
    };
    xhttp.send(param);
}

// function addCalon(){

//     var formData = new FormData();
//     formData.append("myFile", document.getElementById("myFileField").files[0]);

//     var param = "calon="+inputCalon[1].value+"&nis="+inputNis.value+"&visi="+inputVisi.value+"&misi="+inputMisi.value;
//     var xhttp = new XMLHttpRequest();
//     xhttp.open("POST", "../class/admin/insertcalon.php", true);
//     xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded", "");
//     xhttp.onreadystatechange = function() {
//       if (this.readyState == 4 && this.status == 200) {
//         dataJSON = JSON.parse(this.responseText);
//         if(dataJSON.status == "true"){
//             alert('Data Berhasil di tambahkan');
//         }
//         else{
//             alert(dataJSON.message);            
//         }
//         tableCalonKetua();
//         tableCalonWakilKetua();
//       }
//     };
//     xhttp.send(formData);
// }


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
            if(dataJSON.status == true){
                alert(dataJSON.message);                         
                location.reload();
            }
            else{
                alert(dataJSON.message);         
                // console.log(dataJSON.status);                
            }
            // tableSiswa();
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
            if(dataJSON.status == true){
                alert('Data Berhasil di hapus');
                location.reload();
            }
            else{
                alert(dataJSON.message);            
            }
            // tableUsers();
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
    var param = "name="+ updateNama.value +"&gender="+updateGender.value+"&kelas="+ updateKelas.value+"&nis="+ updateNis.value;
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "../class/admin/updatesiswa.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        dataJSON = JSON.parse(this.responseText);
        if(dataJSON.status == true){
            alert('Data Berhasil di Update');
            location.reload();
        }
        else{
            alert(dataJSON.message);            
        }
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
        if(dataJSON.status == true){
            // alert('Data Berhasil di Update');
            alert(dataJSON.message);                        
            // location.reload();
        }
        else{
            alert(dataJSON.message);            
        }
        // tableUsers();
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
                inputGender.value = dataSiswa[0].gender;
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

//rows

function getrowstable(data){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            dataRows = JSON.parse(this.responseText);
            if (dataRows.length > 0){
                for (var index = 1; index <= dataRows.length; index++) {
                    pageContent.innerHTML += '<a onclick="tableSiswa('+index+')">'+index+'</a> ';
                }
            }
            else{
            }
        }
    };
    xmlhttp.open("GET", "../class/admin/rows.php?data="+data, true);
    xmlhttp.send();
}

// table
// function tableSiswa(page){
//     var xmlhttp = new XMLHttpRequest();
//     xmlhttp.onreadystatechange = function() {
//         if (this.readyState == 4 && this.status == 200) {
//             dataSiswa = JSON.parse(this.responseText);
//             tableData.innerHTML = "<tr><th>No</th><th>NIS</th><th>Nama</th><th>Kelas</th><th>Action</th></tr>";
//             var no = 1;
//             if (dataSiswa.length > 0){
//                 for (var index = 0; index < dataSiswa.length; index++) {
//                     tableData.innerHTML += '<tr><td>'+no+'</td><td>'+dataSiswa[index].nis+'</td><td>'+dataSiswa[index].name+'</td><td>'+dataSiswa[index].kelas+'</td><td><span onclick="onModalEditSiswa('+dataSiswa[index].nis+',\''+dataSiswa[index].name+'\','+dataSiswa[index].kelas+')" class="link">Edit</span> / <span class="link tx-red" id="'+dataSiswa[index].id+'" onclick="deleteSiswa(this.id)">Delete</span></td></tr>';
//                     no++;
//                 }
//                 totalData.innerHTML = dataSiswa.length;
//                 return true;
//             }
//             else{
//             }
//         }
//     };
//     xmlhttp.open("GET", "../class/admin/pagging.php?page="+page+"&data=siswa", true);
//     xmlhttp.send();
// }

// function tableUsers(){
//     var xmlhttp = new XMLHttpRequest();
//     xmlhttp.onreadystatechange = function() {
//         if (this.readyState == 4 && this.status == 200) {
//             dataUsers = JSON.parse(this.responseText);
//             tableData.innerHTML = "<tr><th>No</th><th>NIS</th><th>Nama</th><th>Kelas</th><th>Username</th><th>Password</th><th>Action</th></tr>";
//             var no = 1;
//             if (dataUsers.length > 0){
//                 for (var index = 0; index < dataUsers.length; index++) {
//                     tableData.innerHTML += '<tr><td>'+no+'</td><td>'+dataUsers[index].nis_siswa+'</td><td>'+dataUsers[index].name+'</td><td>'+dataUsers[index].kelas+'</td><td>'+dataUsers[index].username+'</td><td>***</td><td><span class="link" onclick="onModalEditUsers(\''+dataUsers[index].nis_siswa+'\')">Edit</span> / <span id="'+dataUsers[index].id+'" onclick="deleteUsers(this.id)" class="link tx-red">Delete</span></td></tr>';
//                     no++;
//                 }
//                 totalData.innerHTML = dataUsers.length;
//                 return true;
//             }
//             else{
//             }
//         }
//     };
//     xmlhttp.open("GET", "../class/admin/getusers.php", true);
//     xmlhttp.send();
// }

function tableCalonKetua(){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            dataCalon = JSON.parse(this.responseText);
            tableDataKetua.innerHTML = "<tr><th>Urut</th><th>Image</th><th>NIS</th><th>Nama</th><th>Kelas</th><th>Visi</th><th>Misi</th><th>Action</th></tr>";
            var no = 1;
            if (dataCalon.length > 0){
                for (var index = 0; index < dataCalon.length; index++) {
                    tableDataKetua.innerHTML += '<tr><td>'+no+'</td><td>'+dataCalon[index].imgpath+'</td><td>'+dataCalon[index].nis_siswa+'</td><td>'+dataCalon[index].name+'</td><td>'+dataCalon[index].kelas+'</td><td>'+dataCalon[index].visi.substring(0,15) + ".."+'</td><td>'+dataCalon[index].misi.substring(0,15) + ".."+'</td><td><span class="link" onclick="onModalEditCalon('+dataCalon[index].nis_siswa+',\'calon_ketua\',\''+dataCalon[index].visi+'\',\''+dataCalon[index].misi+'\')">Edit</span> / <span id="'+dataCalon[index].id+'" onclick="deleteCalon(\'calon_ketua\',this.id)" class="link tx-red">Delete</span></td></tr>';
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
                    // if(dataCalon[index].visi.length > 15) dataCalon[index].visi = dataCalon[index].visi.substring(0,15) + "..";
                    // if(dataCalon[index].misi.length > 15) dataCalon[index].misi = dataCalon[index].misi.substring(0,15) + "..";
                    tableDataWakilKetua.innerHTML += '<tr><td>'+no+'</td><td>'+dataCalon[index].imgpath+'</td><td>'+dataCalon[index].nis_siswa+'</td><td>'+dataCalon[index].name+'</td><td>'+dataCalon[index].kelas+'</td><td>'+dataCalon[index].visi.substring(0,15) + ".."+'</td><td>'+dataCalon[index].misi.substring(0,15) + ".."+'</td><td><span class="link" onclick="onModalEditCalon('+dataCalon[index].nis_siswa+',\'calon_wakilketua\',\''+dataCalon[index].visi+'\',\''+dataCalon[index].misi+'\')">Edit</span> / <span id="'+dataCalon[index].id+'" onclick="deleteCalon(\'calon_wakilketua\',this.id)" class="link tx-red">Delete</span></td></tr>';
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

//dashboard

function piechart(){
    var chart = new CanvasJS.Chart("chartContainer", {
animationEnabled: true,
title: {
    text: "Calon Ketua OSIS"
},
data: [{
    type: "pie",
    startAngle: 240,
    yValueFormatString: "##0.00\"%\"",
    indexLabel: "{label} {y}",
    dataPoints: [
        {y: 79.45, label: "Google"},
        {y: 7.31, label: "Bing"},
        {y: 7.06, label: "Baidu"},
          {y: 7.06, label: "Baidu"}
    ]
}]
    });
    chart.render();
}

var dashJumSiswa = document.getElementById('das-jumsiswa');
var dasRegister = document.getElementById('das-register');
var dasBlumRegister = document.getElementById('das-blumregister');
var dasMemilih = document.getElementById('das-memilih');
var dasBlumMemilih = document.getElementById('das-blummemilih');
function dashboardResult(){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            dataResult = JSON.parse(this.responseText);
            dashJumSiswa.innerHTML = dataResult.datatb.siswa;
            dasRegister.innerHTML = dataResult.datatb.users;
            dasBlumRegister.innerHTML = dataResult.datatb.siswa-dataResult.datatb.users;
            dasMemilih.innerHTML = dataResult.datatb.result;
            dasBlumMemilih.innerHTML = dataResult.datatb.users-dataResult.datatb.result;

            dasKetua.innerHTML = "";
            for (var index = 0; index < dataResult.ketua.length; index++) {
                dasKetua.innerHTML += "<p>"+dataResult.ketua[index].name+" : "+dataResult.ketua[index].count+"</p>";
            }

            dasWakilKetua.innerHTML = "";
            for (var index = 0; index < dataResult.wakilketua.length; index++) {
                dasWakilKetua.innerHTML += "<p>"+dataResult.wakilketua[index].name+" : "+dataResult.wakilketua[index].count+"</p>";
            }
        }
    };
    xmlhttp.open("GET", "../class/admin/dashboard.php", true);
    xmlhttp.send();
}