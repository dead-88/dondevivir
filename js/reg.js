function RegUser() {
    var connect,form,result,name,cedula,telefono,celular,email,pass,r_pass,tyc;
    name = document.getElementById('name').value;
    cedula = document.getElementById('cedula').value;
    telefono = document.getElementById('telf').value;
    celular = document.getElementById('cel').value;
    email = document.getElementById('email').value;
    pass = document.getElementById('pass').value;
    r_pass = document.getElementById('r_pass').value;
    tyc = document.getElementById('tyc').checked ? true : false;

    if(true == tyc){
        if(name != '' && cedula != '' && telefono != '' && celular != '' && email != '' && tyc != ''){
            if(pass == r_pass){
                form = 'name=' + name + '&cedula=' + cedula + '&telf=' + telefono + '&cel=' + celular + '&email=' + email + '&pass=' + pass + '&tyc=' + tyc;
                connect = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
                connect.onreadystatechange = function () {
                    if(connect.readyState == 4 && connect.status == 200){
                        if(connect.responseText == 1){
                            result = '<div class="alert alert-dismissible alert-success">';
                            result += '<h4>Registro completado.!</h4>';
                            result += '<p><strong>Estamos redireccionantote...</strong></p>';
                            result += '</div>';
                            document.getElementById('_AJAX_REG_').innerHTML = result;
                            location.reload();
                            document.getElementById('name').value = ("");
                            document.getElementById('cedula').value = ("");
                            document.getElementById('telf').value = ("");
                            document.getElementById('cel').value = ("");
                            document.getElementById('email').value = ("");
                        }else{
                            document.getElementById('_AJAX_REG_').innerHTML = connect.responseText;
                        }
                    }else if(connect.readyState != 4){
                        result = '<div class="alert alert-dismissible alert-warning">';
                        result += '<button type="button" class="close" data-dismiss="alert">x</button>';
                        result += '<h4>Procesando...</h4>';
                        result += '<p><strong>Estamos procesando tu registro...</strong></p>';
                        result += '</div>';
                        document.getElementById('_AJAX_REG_').innerHTML = result;
                    }
                }
                connect.open('POST','controllers/registerUsers.php',true);
                connect.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
                connect.send(form);
            }else{
                result = '<div class="alert alert-dismissable alert-danger">';
                result += '<button type="button" class="close" data-dismiss="alert">x</button>';
                result += '<h4>ERROR</h4>';
                result += '<p><strong>Las contraseñas no coinsiden</strong></p>';
                result += '</div>';
                document.getElementById('_AJAX_REG_').innerHTML = result;
            }
        }else{
            result = '<div class="alert alert-dismissable alert-danger">';
            result += '<button type="button" class="close" data-dismiss="alert">x</button>';
            result += '<h4>ERROR</h4>';
            result += '<p><strong>Todos los campos deben estar llenos.</strong></p>';
            result += '</div>';
            document.getElementById('_AJAX_REG_').innerHTML = result;
        }
    }else{
        result = '<div class="alert alert-dismissable alert-danger">';
        result += '<button type="button" class="close" data-dismiss="alert">x</button>';
        result += '<h4>ERROR</h4>';
        result += '<p><strong>Los terminos y condiciones deben ser aceptados.</strong></p>';
        result += '</div>';
        document.getElementById('_AJAX_REG_').innerHTML = result;
    }
}

function EnterRunReg(e){
    if(e.keyCode == 13){
        RegUser();
    }
}