<?php

    class Consultations{
        public function insert_users($name,$cedula,$telefono,$celular,$email,$pass){
            $modelo = new Conection();
            $connect = $modelo->get_conection();
            $query = "INSERT INTO usuarios(nombre,cedula,telefono,celular,email,pass) VALUES(:nombre,:cedula,:telefono,:celular,:email,:pass);";
            $stm = $connect->prepare($query);
            $stm->bindParam(':nombre',$name);
            $stm->bindParam(':cedula',$cedula);
            $stm->bindParam(':telefono',$telefono);
            $stm->bindParam(':celular',$celular);
            $stm->bindParam(':email',$email);
            $stm->bindParam(':pass',$pass);
            $stm->execute();
        }

        public function insertHorario($user,$dia,$fInicio,$fFin){
            $modelo = new Conection();
            $connect = $modelo->get_conection();
            $query = "INSERT INTO horario(usuario,dia_semana,hora_inicio,hora_fin) VALUES(:usuario,:dia_semana,:hora_inicio,:hora_fin);";
            $stm = $connect->prepare($query);
            $stm->bindParam(':usuario',$user);
            $stm->bindParam(':dia_semana',$dia);
            $stm->bindParam(':hora_inicio',$fInicio);
            $stm->bindParam(':hora_fin',$fFin);
            $stm->execute();
        }

        public function viewUsers(){
            $rows = null;
            $modelo = new Conection();
            $connect = $modelo->get_conection();
            $query = "SELECT * FROM usuarios;";
            $stm = $connect->prepare($query);
            $stm->execute();
            while($result = $stm->fetch()){
                $rows[] = $result;
            }
            return $rows;
//            $us_actuales = $stm->rowCount();
//
//            if(!isset($_SESSION['cantidad_usuarios'])){
//                $_SESSION['cantidad_usuarios'] = $us_actuales;
//            }
//
//            if($_SESSION['cantidad_usuarios'] != $us_actuales){
//                while($result = $stm->fetch()){
//                    $rows[$result['id']] = $result;
//                }
//            }else{
//                if(!isset($_SESSION['users'])){
//                    while($result = $stm->fetch()){
//                        $rows[$result['id']] = $result;
//                    }
//                }else{
//                    $rows = $_SESSION['users'];
//                }
//            }
//            $_SESSION['users'] = $rows;
//            return $_SESSION['users'];
        }
    }