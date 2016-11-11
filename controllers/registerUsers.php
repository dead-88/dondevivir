<?php

    require_once '../models/class.conection.php';
    require_once '../models/class.consultations.php';

    $modelo = new Conection();
    $connect = $modelo->get_conection();
    $query = "SELECT * FROM usuarios WHERE (cedula = :cedula OR email = :email) LIMIT 1;";
    $stm = $connect->prepare($query);
    $cedula = htmlentities(addslashes($_POST['cedula']));
    $email = htmlentities(addslashes($_POST['email']));
    $stm->bindValue(':cedula',$cedula);
    $stm->bindValue(':email',$email);
    $stm->execute();
    $rows = $stm->rowCount();
    if($rows == 0){
//        var_dump($rows);
        $name = htmlentities(addslashes($_POST['name']));
        $telefono = htmlentities(addslashes($_POST['telf']));
        $celular = htmlentities(addslashes($_POST['cel']));
        $modelo = new Consultations();
        $result = $modelo->insert_users($name,$cedula,$telefono,$celular,$email);
        $HTML = 1;
    }else{
        $HTML = '<div class="alert alert-dismissible alert-danger">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    <strong>ERROR:</strong> verifique que tus datos (email o cedula) no esten registrados. <a href="https://www.hotmail.com" target="_blank">aquí</a>
                 </div>';
    }
    echo $HTML;