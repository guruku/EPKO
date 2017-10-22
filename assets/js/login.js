// init

var inputNis = document.getElementById('input-nis');
var inputUsername = document.getElementById('input-username');
var inputPassword = document.getElementById('input-password');
var inputRetypePassword = document.getElementById('input-retypepassword');
var inputToken = document.getElementById('input-token');

var modalAlert = document.getElementById('modal-alert');
var alertContent = document.getElementById('alert-content');

var btnCloseModal = document.getElementById('btn-closemodal');

var titleAlert = document.getElementById('title-alert');
// signup
function signup(){
    if(inputNis.value == "" || inputUsername.value == "" || inputPassword.value =="" || inputRetypePassword.value == ""){
        titleAlert.innerHTML = "Alert";
        alertContent.innerHTML = "Mohon dilengkapi :D";
        alertModal();
    }
    else{
        if(inputPassword.value == inputRetypePassword.value){
            insertSignup()
        }
        else{
            titleAlert.innerHTML = "Alert";
            alertContent.innerHTML = "Konfirmasi password tidak sama :(";
            alertModal();
        }
    }
}

function insertSignup(){
    var param = "token="+ inputToken.value +"&nis="+ inputNis.value +"&username="+ inputUsername.value+"&password="+inputPassword.value+"&recaptcha="+grecaptcha.getResponse();
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "class/signup.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        dataJSON = JSON.parse(this.responseText);
        if(dataJSON.status == 'true'){
            titleAlert.innerHTML = "Alert";
            alertContent.innerHTML = dataJSON.message;
            btnCloseModal.style.display = "none";
            alertModal();
            setTimeout(function(){
                location.href = "signin.php";
            },1000);
           
        }
        else{
            titleAlert.innerHTML = "Alert";
            alertContent.innerHTML = dataJSON.message;
            btnCloseModal.style.display = "none";
            alertModal();
            setTimeout(function(){
                location.href = "signup.php";
            },2000);
        }
      }
    };
    xhttp.send(param);
}

//login

function signin(){
    if(inputUsername.value == "" || inputPassword.value ==""){
        titleAlert.innerHTML = "Alert";
        alertContent.innerHTML = "Mohon dilengkapi :D";
        alertModal();
    }
    else{
        requestLogin();
    }
}

function requestLogin(){
    var param = "username="+ inputUsername.value+"&password="+inputPassword.value+"&token="+inputToken.value;
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "class/signin.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        dataJSON = JSON.parse(this.responseText);
        if(dataJSON.status == 'true'){
            titleAlert.innerHTML = "Alert";
            alertContent.innerHTML = "Loading..";
            btnCloseModal.style.display = "none";
            alertModal();
            setTimeout(function(){
                location.href = "index.php";
            },1000);
        }
        else{
            titleAlert.innerHTML = "Alert";
            alertContent.innerHTML = dataJSON.message;
            alertModal();
        }
      }
    };
    xhttp.send(param);
}

//modal

function alertModal(){
    modalAlert.style.display = "block";
}
function closeModal(){
    modalAlert.style.display = "none";
}

//cek nis

function cekNis(){
    if(inputNis.value !== ""){
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                dataJSON = JSON.parse(this.responseText);
                if(dataJSON.length > 0){
                    titleAlert.innerHTML = "Cek NIS";
                    alertContent.innerHTML = "<p>"+dataJSON[0].name+"</p><p>"+dataJSON[0].kelas+"</p>";
                    alertModal()
                }
                else{
                    alertContent.innerHTML = "NIS tidak ditemukan";
                    alertModal()
                }
            }
        };
        xmlhttp.open("GET", "class/ceknis.php?nis="+inputNis.value, true);
        xmlhttp.send();
    }
}


