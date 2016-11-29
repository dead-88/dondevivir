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
        public function insertInm($usuario,$categoria,$estado,$tipo_piso,$ancho_terreno,$largo_terreno,$tipo_pared,$numero_pisos,$cantidad_bano,$ubicacion,$direccion,$precio){
            $modelo = new Conection();
            $connect = $modelo->get_conection();
            $query = "INSERT INTO inmueble(usuario,categoria,tipo_vivienda,tipo_piso,ancho_terreno,largo_terreno,tipo_pared,numero_plantas,cantidad_banos,ubicacion,direccion,precio) VALUES(:usuario,:categoria,:tipo_vivienda,:tipo_piso,:ancho_terreno,:largo_terreno,:tipo_pared,:numero_plantas,:cantidad_banos,:ubicacion,:direccion,:precio);";
            $stm = $connect->prepare($query);
            $stm->bindParam(':usuario',$usuario);
            $stm->bindParam(':categoria',$categoria);
            $stm->bindParam(':tipo_vivienda',$estado);
            $stm->bindParam(':tipo_piso',$tipo_piso);
            $stm->bindParam(':ancho_terreno',$ancho_terreno);
            $stm->bindParam(':largo_terreno',$largo_terreno);
            $stm->bindParam(':tipo_pared',$tipo_pared);
            $stm->bindParam(':numero_plantas',$numero_pisos);
            $stm->bindParam(':cantidad_banos',$cantidad_bano);
            $stm->bindParam(':ubicacion',$ubicacion);
            $stm->bindParam(':direccion',$direccion);
            $stm->bindParam(':precio',$precio);
            $stm->execute();
        }

        public function insertPhoto($inm,$pho){
            $modelo = new Conection();
            $connect = $modelo->get_conection();
            $query = "INSERT INTO fotos(inmueble,url_foto) VALUE(:inmueble,:url_foto)";
            $stm = $connect->prepare($query);
            $stm->bindParam(':inmueble',$inm);
            $stm->bindParam(':url_foto',$pho);
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