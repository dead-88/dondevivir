<?php
sleep(1);

require_once '../models/class.conection.php';
require_once '../models/class.consultations.php';

//print_r($_FILES);
    require_once $_SERVER['DOCUMENT_ROOT'] . '/dondevivir/library/resize.php';
    if(isset($_POST['subir']) && $_POST['subir'] == 'Subir'){

        //print_r($_FILES);
        if(isset($_FILES['file'])){
//            echo 'seguimos';
            $carpeta = $_SERVER['DOCUMENT_ROOT'] . '/dondevivir/img/imgInm/';
            if(is_dir($carpeta) && is_writable($carpeta)){
                $result = count($_FILES['file']['name']);
                $endExtension = array('jpg','gif','png','jpeg');
                $msj = '';

                for($i = 0; $i < $result; $i ++){
//                    echo 'Nombre: '.$_FILES['file']['name'][$i].'<br>'.
//                        'Temporal: '.$_FILES['file']['tmp_name'][$i].'<br>';
                    $fileName = $_FILES['file']['name'][$i];
                    $fileTemp = $_FILES['file']['tmp_name'][$i];

                    $string = substr(md5(uniqid(rand())),0,12);
                    $nameNewFile = $string . '.jpg';
                    $thumbName = 'thumb_' . $nameNewFile;
                    $extencion = pathinfo($fileName,PATHINFO_EXTENSION);
                    $altName = basename($fileName, '.' . $extencion);
//                    echo 'name ' . $nameNewFile . '<br>'.
//                         'thumb ' . $thumbName . '<br>'.
//                         'alt ' . $altName . '<br>';
                    $fileInfo = pathinfo($fileName);
                    if(in_array($fileInfo['extension'],$endExtension)){
//                        echo 'seguimos';
                        //
                        /**
                         * Creando thumnails, y redireccionando las imagenes originales
                         */
                        copy($fileTemp,$carpeta . $fileName);
                        $thumb = new thumbnail($carpeta . $fileName);
                        $thumb->size_width(100);
                        $thumb->size_height(100);
                        $thumb->jpeg_quality(88);
                        $thumb->save($carpeta.$thumbName);
                        //Dimension imagen original
                        $thumb = new thumbnail($carpeta . $fileName);
                        $thumb->size_width(400);
                        $thumb->size_height(300);
                        $thumb->jpeg_quality(100);
                        $thumb->save($carpeta.$nameNewFile);
                        unlink($carpeta.$nameNewFile);

                        $msj = 5;
                        session_start();
                        $categoria = 'Apartamento';
                        $user = $_SESSION['users'];
                        $imagenBinario = addslashes(file_get_contents($fileTemp));

                        $modelo = new Conection();
                        $connect = $modelo->get_conection();
                        $consulta = "INSERT INTO fotos(inmueble,usuario,name,foto,alt) VALUES ('$categoria','$user','$nameNewFile','$imagenBinario','$altName')";
                        $stm = $connect->prepare($consulta);
                        $stm->execute();

                    }else{
                        $msj = 4;
                    }

                }//Fin del bucle

                switch ($msj){
                    case 4:
                        echo '4';
                    break;
                    case 5:
                        echo '5';
                    break;
                }
                //Fin Switch

            }else{
//                echo 'La carpeta no tiene permisos';
                echo '3';
            }
        }else{
//            echo 'vacio';
            echo '2';
        }

    }else{
        header('location: ../index.php');
    } // Fin de validacion