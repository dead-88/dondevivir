<?php

    require_once '../models/class.conection.php';
    require_once '../models/class.consultations.php';


    $user = htmlentities(addslashes($_POST['user']));
    $dia = htmlentities(addslashes($_POST['dia']));
    $fIni = htmlentities(addslashes($_POST['inicio']));
    $fFin = htmlentities(addslashes($_POST['fin']));

    if(strlen($user) > 0 && strlen($dia) > 0 && strlen($fIni) > 0 && strlen($fFin) > 0){
        $modelo = new Consultations();
        $connect = $modelo->insertHorario($user,$dia,$fIni,$fFin);
        echo 1;
    }