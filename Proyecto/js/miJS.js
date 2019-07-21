/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function showPassword() {
    var key_attr = $('#key').attr('type');            
    if(key_attr !== 'text') {
        $('.checkbox').addClass('show');
        $('#key').attr('type', 'text');
    } else {
        $('.checkbox').removeClass('show');
        $('#key').attr('type', 'password');
    }
}

function validaLogin(){
    var usuario  = document.getElementById("usuario");
    var clave   = document.getElementById("password");

    if (usuario.value === "" || usuario.value === null) {
        alert("Campo obligario");
        txt.style.border = "2px solid red";
        return false;
        } else {
        txt.style.border = "";
    }

    if (clave.value === "" || clave.value === null) {
        alert("Campo obligario");
        txt.style.border = "2px solid red";
        return false;
        } else {
        txt.style.border = "";
    }
}

$('.selectpicker').selectpicker();

     $('.selectpicker').selectpicker({
    style: 'btn-info',
    size: 4
    });

