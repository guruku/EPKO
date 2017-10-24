// init
var navContent = document.getElementById('nav-content');

var modalAlert = document.getElementById('modal-alert');
var alertContent = document.getElementById('alert-content');
var alertTitlte = document.getElementById('alert-title');

var btnCloseModal = document.getElementById('btn-closemodal');

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


function closeModal(){
modalAlert.style.display = "none";
}

function alertModal(){
    modalAlert.style.display = "block";
}

//nav
function about(){
    alertContent.innerHTML = "Copyright 2017 PTIK | JondesCode | Supported By Ondool95, Jagongan Anak Gaul, CP : 082199066627 WA / @haffjjj";
    alertModal();
}