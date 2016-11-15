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
    }