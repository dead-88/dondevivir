<?php
    require_once '../models/class.conection.php';
    require_once '../models/class.consultations.php';

    $usuario = htmlentities(addslashes($_POST['user']));
    $categoria = htmlentities(addslashes($_POST['select']));
    $estado = htmlentities(addslashes($_POST['estado']));
    $tipo_pisos = htmlentities(addslashes($_POST['tipo_piso']));
    $ancho = htmlentities(addslashes($_POST['ancho_terreno']));
    $largo = htmlentities(addslashes($_POST['largo_terreno']));
    $pared = htmlentities(addslashes($_POST['tipo_pared']));
    $numero_pisos = htmlentities(addslashes($_POST['numero_pisos']));
    $cant_banos = htmlentities(addslashes($_POST['cantidad_bano']));
    $ubicacion = htmlentities(addslashes($_POST['ubicacion']));
    $direccion = htmlentities(addslashes($_POST['direccion']));
    $precio  = htmlentities(addslashes($_POST['precio']));



    if(strlen($usuario) > 0 && strlen($categoria) > 0 && strlen($estado) > 0 && strlen($tipo_pisos) > 0 && strlen($ancho) > 0 && strlen($largo) > 0 && strlen($pared) > 0 && strlen($numero_pisos) > 0 && strlen($cant_banos) > 0 && strlen($ubicacion) > 0 && strlen($direccion) > 0 && strlen($precio) > 0){
        $modelo = new Consultations();
        $result = $modelo->insertInm($usuario,$categoria,$estado,$tipo_pisos,$ancho,$largo,$pared,$numero_pisos,$cant_banos,$ubicacion,$direccion,$precio);
        echo 1;
    }

