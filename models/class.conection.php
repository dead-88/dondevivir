<?php

    class Conection{
        public function get_conection(){
            try{
                $connect = new PDO("mysql: host=127.0.0.1;dbname=dondevivir;charset=utf8;","root","");
                $connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
                return $connect;
            }catch (Exception $e){
                return "Error al conectar a la base de daos".$e->getMessage();
            }
        }
    }

