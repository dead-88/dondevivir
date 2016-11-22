<?php

    require_once '../models/class.conection.php';


    session_start();
    $modelo = new Conection();
    $connect = $modelo->get_conection();
    $user_email = trim($_POST['login']);
    $user_pass = trim($_POST['password']);
    $password = sha1($user_pass);
    try{

        $stm = $connect->prepare("SELECT * FROM usuarios WHERE email = :email");
        $stm->execute(array(":email"=>$user_email));
        $row = $stm->fetch(PDO::FETCH_ASSOC);
        $count = $stm->rowCount();
        if($row['pass'] == $password){
            echo 1; //login
            $_SESSION['users'] = $row['id'];
        }else{
            echo '<div class="alert alert-dismissible alert-danger">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    <p><strong>ERROR!</strong> credenciales incorrectas.</p>
                  </div>';
        }

//        $query = "SELECT email,pass FROM usuarios WHERE  email = :login AND pass = :password LIMIT 1;";
//        $stm = $connect->prepare($query);
//        $login = htmlentities(addslashes($_POST['login']));
//        $pass = htmlentities(addslashes($_POST['password']));
//        $encrypt = sha1($pass);
//        $stm->bindValue(':login',$login);
//        $stm->bindValue(':password',$encrypt);
//        $stm->execute();
//
//        $row = $stm->fetch(PDO::FETCH_ASSOC);
//        $rows = $stm->rowCount();
//        if($rows != 0){
//            session_start();
//            $_SESSION['users'] = $row['id'];
//            echo 1;
//        }else{
//            echo '<div class="alert alert-dismissible alert-danger">
//                    <button type="button" class="close" data-dismiss="alert">x</button>
//                    <strong>ERROR:</strong> credenciales incorrectas. <a href="https://www.hotmail.com" target="_blank">aquí</a>
//                 </div>';
//        }
    }catch (PDOException $e){
        die("Error al conectar con la base de datos: ".$e->getMessage());
    }