// init

var inputNis = document.getElementById('input-nis');
var inputUsername = document.getElementById('input-username');
var inputPassword = document.getElementById('input-password');
var inputRetypePassword = document.getElementById('input-retypepassword');
var inputToken = document.getElementById('input-token');

// signup
function signup(){
    if(inputNis.value == "" || inputUsername.value == "" || inputPassword.value =="" || inputRetypePassword.value == ""){
        alert('Mohon di lengkapi :)');
    }
    else{
        if(inputPassword.value == inputRetypePassword.value){
            insertSignup()
        }
        else{
            alert('Konfirmasi password tidak sama');
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
            alert(dataJSON.message);
            location.href = "signin.php";
        }
        else{
            alert(dataJSON.message);
            location.href = "signup.php";
        }
      }
    };
    xhttp.send(param);
}

//login

function signin(){
    if(inputUsername.value == "" || inputPassword.value ==""){
        alert('Mohon di lengkapi :)');
    }
    else{
        requestLogin();
    }
}

function requestLogin(){
    var param = "username="+ inputUsername.value+"&password="+inputPassword.value;
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "class/signin.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        dataJSON = JSON.parse(this.responseText);
        if(dataJSON.status == 'true'){
            alert(dataJSON.message);
            location.href = "index.php";
        }
        else{
            alert(dataJSON.message);
        }
      }
    };
    xhttp.send(param);
}

