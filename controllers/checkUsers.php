<?php

    require_once '../models/class.conection.php';

    try{
        $modelo = new Conection();
        $connect = $modelo->get_conection();
        $query = "SELECT cedula,email FROM usuarios WHERE  email = :login && pass = :pass LIMIT 1;";
        $stm = $connect->prepare($query);
        $login = htmlentities(addslashes($_POST['login']));
        $pass = htmlentities(addslashes($_POST['pass']));
        $encrypt = sha1($pass);
        $stm->bindValue(':login',$login);
        $stm->bindValue(':pass',$encrypt);
        $stm->execute();
        $rows = $stm->rowCount();
        if($rows == 1){
            session_start();
            $_SESSION['users'] = $_POST['login'];
            echo 1;
        }else{
            echo '<div class="alert alert-dismissible alert-danger">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    <strong>ERROR:</strong> credenciales incorrectas. <a href="https://www.hotmail.com" target="_blank">aquí</a>
                 </div>';
        }
    }catch (Exception $e){
        die("Error al conectar con la base de datos: ".$e->getMessage());
    }