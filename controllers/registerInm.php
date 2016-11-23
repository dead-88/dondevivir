<?php

//stado = document.getElementById('estado').value;
//tipo_piso = document.getElementById('tipo_piso').value;
//ancho_terreno = document.getElementById('ancho_terreno').value;
//largo_terreno = document.getElementById('largo_terreno').value;
//tipo_pared = document.getElementById('tipo_pared').value;
//numero_piso = document.getElementById('numero_pisos').value;
//cantidad_bano = document.getElementById('cantidad_bano').value;
//ubicacion = document.getElementById('ubicacion').value;
//direccion = document.getElementById('direccion').value;
//precio = document.getElementById('precio').value;
//foto = document.getElementById('fotos').value;

    require_once '../models/class.conection.php';
    require_once '../models/class.consultations.php';

    $estado = htmlentities(addslashes($_POST['estado']));
    $tipo_pisos = htmlentities(addslashes($_POST['tipo_piso']));
    $ancho = htmlentities(addslashes($_POST['ancho_terreno']));
    $largo = htmlentities(addslashes($_POST['largo_terreno']));
    $pared = htmlentities(addslashes($_POST['tipo_pared']));
    $numero_pisos = htmlentities(addslashes($_POST['numero_pisos']));
    $cant_baños = htmlentities(addslashes($_POST['cantidad_bano']));
    $ubicacion = htmlentities(addslashes($_POST['ubicacion']));
    $direccion = htmlentities(addslashes($_POST['direccion']));
    $precio  = htmlentities(addslashes($_POST['precio']));

    if(strlen($estado) > 0 && strlen($tipo_pisos) > 0 && strlen($ancho) > 0 && strlen($largo) > 0 && strlen($pared) > 0 && strlen($numero_pisos) > 0 && strlen($cant_baños) > 0 && strlen($ubicacion) > 0 && strlen($direccion) > 0 && strlen($precio) > 0){
        $modelo = new Consultations();
        $result = $modelo->insertInm($estado,$tipo_pisos,$ancho,$largo,$pared,$numero_pisos,$cant_baños,$ubicacion,$direccion,$precio);
        echo 1;
    }
