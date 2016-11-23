function acces() {
    var connect,form,result,login,pass;
    login = document.getElementById('login').value;
    pass = document.getElementById('password').value;

    if(login != '' && pass != ''){
        form = 'login=' + login + '&password=' + pass;
        connect = XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        connect.onreadystatechange = function () {
            if(connect.readyState == 4 && connect.status == 200){
                if(connect.responseText == 1){
                    result = '<div class="alert alert-dismissible alert-success">';
                    result += '<h4>Conectado!</h4>';
                    result += '<p class="pull-right"><img src="img/reload.gif"></p>';
                    result += '<p><strong>Procesando tu sesion...</strong></p>';
                    result += '</div>';
                    document.getElementById('_AJAX_USER_').innerHTML = result;
                    setTimeout(function () {
                        location.reload();
                    },2000)
                }else{
                    document.getElementById('_AJAX_USER_').innerHTML = connect.responseText;
                }
            }else if(connect.readyState != 4){
                result = '<div class="alert alert-dismissible alert-warning">';
                result += '<button class="close" data-dismiss="alert" type="button">X</button>';
                result += '<h4>Tiempo agotado!</h4>';
                result += '<p><strong>Wait!</strong> procesando...</p>';
                result += '</div>';
                document.getElementById('_AJAX_USER_').innerHTML = result;
            }
        }
        connect.open('POST','controllers/checkUsers.php',true);
        connect.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
        connect.send(form);
    }else{
        result = '<div class="alert alert-dismissible alert-danger">';
        result += '<button class="close" data-dismiss="alert" type="button">X</button>';
        result += '<p><strong>ERROR!</strong> Complete todos los campos vacios...</p>';
        result += '</div>';
        document.getElementById('_AJAX_USER_').innerHTML = result;
    }
}

function EnterKeyboard(e) {
    if(e.keyCode == 13){
        acces();
    }
}