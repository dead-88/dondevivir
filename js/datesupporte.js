function sendDate() {
    var connect,form,result,users,dia,hora_inicio,hora_fin;
    dia = document.getElementById('dia').value;
    hora_inicio = document.getElementById('inicio').value;
    hora_fin = document.getElementById('fin').value;
    users = document.getElementById('user').value;

    if(users != '' && dia != '' && hora_inicio != '' && hora_fin != ''){
        form =  'user=' + users + '&dia=' + dia + '&inicio=' + hora_inicio + '&fin=' + hora_fin;
        connect = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        connect.onreadystatechange = function () {
            if(connect.readyState == 4 && connect.status == 200){
                if(connect.responseText == 1){
                    result = '<div class="alert alert-dismissible alert-success">';
                    result += '<h4>Registro Correcto!</h4>';
                    result += '<p><strong>Procesando tus datos...</strong></p>';
                    result += '</div>';
                    document.getElementById('_AJAX_DATE_').innerHTML = result;
                    location.reload();
                }else{
                    document.getElementById('_AJAX_DATE_').innerHTML = connect.responseText;
                }
            }else if(connect.readyState != 4){
                result = '<div class="alert alert-dismissible alert-success">';
                result += '<h4>Espere un momento por favor!</h4>';
                result += '<p><strong>Procesando tus datos correctamente...</strong></p>';
                result += '</div>';
                document.getElementById('_AJAX_DATE_').innerHTML = result;
            }
        }
        connect.open('POST','controllers/registerHorario.php',true);
        connect.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
        connect.send(form);
    }else{
        result = '<div class="alert alert-dismissable alert-danger">';
        result += '<button type="button" class="close" data-dismiss="alert">x</button>';
        result += '<h4>ERROR</h4>';
        result += '<p><strong>Todos los campos deben estar llenos.</strong></p>';
        result += '</div>';
        document.getElementById('_AJAX_DATE_').innerHTML = result;
    }
}

function keyPress(e){
    if(e.keyCode == 13){
        sendDate();
    }
}