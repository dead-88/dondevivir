function registerInm() {
    var connect, form, result, estado, tipo_piso, ancho_terreno, largo_terreno ,tipo_pared, numero_piso, cantidad_bano, ubicacion, direccion, precio, foto;
    estado = document.getElementById('estado').value;
    tipo_piso = document.getElementById('tipo_piso').value;
    ancho_terreno = document.getElementById('ancho_terreno').value;
    largo_terreno = document.getElementById('largo_terreno').value;
    tipo_pared = document.getElementById('tipo_pared').value;
    numero_piso = document.getElementById('numero_pisos').value;
    cantidad_bano = document.getElementById('cantidad_bano').value;
    ubicacion = document.getElementById('ubicacion').value;
    direccion = document.getElementById('direccion').value;
    precio = document.getElementById('precio').value;
    foto = document.getElementById('fotos').value;
    if (estado != '' && tipo_piso != '' && ancho_terreno != '' && largo_terreno != '' && tipo_pared != '' && numero_piso != '' && cantidad_bano != '' && ubicacion != '' && direccion != '' && precio != '' && foto != '') {
        form = 'estado=' + estado + '&tipo_piso=' + tipo_piso + '&ancho_terreno=' + ancho_terreno + '&largo_terreno=' + largo_terreno + '&tipo_pared=' + tipo_pared + '&numero_pisos=' + numero_piso + '&cantidad_bano=' + cantidad_bano + '&ubicacion=' + '&direccion=' + direccion + '&precio=' + precio + '&fotos=' + foto;
        connect = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft-XMLHTTP');
        connect.onreadystatechange = function () {
            if (connect.readyState == 4 && connect.status == 200) {
                if (connect.responseText == 1) {
                    result = '<div class="alert alert-dismissable alert-danger">';
                    result += '<h4>Conectado!</h4>';
                    result += '<p><strong>Redireccionandote...</strong></p>';
                    result += '</div>';
                    document.getElementById('_AJAX_INM_').innerHTML = result;
                    document.reload();
                } else {
                    document.getElementById('_AJAX_INM_').innerHTML = connect.responseText;
                }
            } else if (connect.readyState != 4) {
                result = '<div class="alert alert-dismissable alert-danger">';
                result += '<button type="button" class="close" data-dismiss="alert">x</button>';
                result += '<h4>Procesando...</h4>';
                result += '<p><strong>Waite please.</strong></p>';
                result += '</div>';
                document.getElementById('_AJAX_INM_').innerHTML = result;
                document.getElementById('_AJAX_INM_').innerHTML = result;
            }
            connect.open('POST', 'controllers/registerInm.php', true);
            connect.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            connect.send(form);
        }
    } else {
        result = '<div class="alert alert-dismissable alert-danger">';
        result += '<button type="button" class="close" data-dismiss="alert">x</button>';
        result += '<h4>ERROR!</h4>';
        result += '<p><strong>Todos los campos deben estar llenos.</strong></p>';
        result += '</div>';
        document.getElementById('_AJAX_INM_').innerHTML = result;
    }
}

function EnterRunRegInm(e) {
    if(e.keyCode == 13){
        registerInm();
    }
}
