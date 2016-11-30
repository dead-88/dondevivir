<?php

    require_once '../models/class.conection.php';
    require_once '../models/class.consultations.php';
//if (isset($_FILES["file"]))
//{
//    $file = $_FILES["file"];
//    $nombre = $file["name"];
//    $tipo = $file["type"];
//    $ruta_provisional = $file["tmp_name"];
//    $size = $file["size"];
//    $dimensiones = getimagesize($ruta_provisional);
//    $width = $dimensiones[0];
//    $height = $dimensiones[1];
//    $carpeta = "img/imgInm/";
//
//    if(!is_dir('../img/imgInm/')){
//        mkdir('../img/imgInm/');
//    }
//
//    if ($tipo != 'image/jpg' && $tipo != 'image/jpeg' && $tipo != 'image/png' && $tipo != 'image/gif')
//    {
//        echo "Error, el archivo no es una imagen";
//    }else if ($size > 1024*1024){
//        echo "Error, el tamaño máximo permitido es un 1MB";
//    }else if ($width > 3000 || $height > 3000){
//        echo "Error la anchura y la altura maxima permitida es 3000px";
//    }else if($width < 100 || $height < 100){
//        echo "Error la anchura y la altura mínima permitida es 100px";
//    }else{
//        $src = $carpeta.$nombre;
//        move_uploaded_file($ruta_provisional, $src);
//        echo "<img src='$src'>";
//    }
//}
//


//if (array_key_exists('HTTP_X_FILE_NAME', $_SERVER) && array_key_exists('CONTENT_LENGTH', $_SERVER)) {
//    $fileName = $_SERVER['HTTP_X_FILE_NAME'];
//    $contentLength = $_SERVER['CONTENT_LENGTH'];
//} else throw new Exception("Error retrieving headers");
//
//$path = '../img/imgInm/';
//
//if (!$contentLength > 0) {
//    throw new Exception('No file uploaded!');
//}
//
//file_put_contents(
//    $path . $fileName,
//    file_get_contents("php://input")
//);
//
//chmod($path.$fileName, 0777);

    if($_FILES['imagen']['tmp_name'] != ''){

        //Convertimos la información de la imagen en binario para insertarla en la DB
        $imagenBinaria = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));

        //Nombre del archivo
        $nombreArchivo = $_FILES['imagen']['name'];

        //Extensiones permitidas
        $extensiones = array('jpg', 'jpeg', 'gif', 'png', 'bmp');

        //Obtenemos la extensión (en minúsculas) para poder comparar
        $extension = strtolower(end(explode('.', $nombreArchivo)));

        //Verificamos que sea una extensión permitida, si no lo es mostramos un mensaje de error
        if(!in_array($extension, $extensiones)) {
            die( 'Sólo se permiten archivos con las siguientes extensiones: '.implode(', ', $extensiones) );
        }else{
            //Si la extensión es correcta, procedemos a comprobar el tamaño del archivo subido
            //Y definimos el máximo que se puede subir
            //Por defecto el máximo es de 2 MB, pero se puede aumentar desde el .htaccess o en la directiva 'upload_max_filesize' en el php.ini

            $tamañoArchivo = $_FILES['imagen']['size']; //Obtenemos el tamaño del archivo en Bytes
            $tamañoArchivoKB = round(intval(strval( $tamañoArchivo / 1024 ))); //Pasamos el tamaño del archivo a KB

            $tamañoMaximoKB = "5120"; //Tamaño máximo expresado en KB
            $tamañoMaximoBytes = $tamañoMaximoKB * 1024; // -> 5242880 Bytes -> 5 MB

            //Comprobamos el tamaño del archivo, y mostramos un mensaje si es mayor al tamaño expresado en Bytes
            if($tamañoArchivo > $tamañoMaximoBytes) {
                die( "El archivo ".$nombreArchivo." es demasiado grande. El tamaño máximo del archivo es de ".$tamañoMaximoKB."Kb." );
            }else{
                //Si el tamaño es correcto, subimos los datos
                session_start();
                $user = $_SESSION['users'];
                $modelo = new Conection();
                $connect = $modelo->get_conection();
                $consulta = "UPDATE usuarios SET foto = '$imagenBinaria' WHERE id_usuario = '$user'";
                $stm = $connect->prepare($consulta);
                $stm->execute();

                //Hacemos la inserción, y si es correcta, se procede
                if($stm) {
                    //Reiniciamos los inputs
                    echo '<script>$("#enviarimagenes input,textarea").each(function(index) {
                            $(this).val("");
                        });
                      </script>';
                    //Mostramos un mensaje
                    die( "<div class='alert alert-dismissible alert-success'>
                            <button type='button' class='close' data-dismiss='alert'>x</button>
                            <p>El archivo con el nombre <strong>".$nombreArchivo."</strong> fue subido. Su peso es de <strong>".$tamañoArchivoKB."</strong> KB.</p>
                          </div>
                          <script>location.reload()</script>" );
                } else {
                    //Si hay algún error con la inserción, se muestra un mensaje
                    die( "<div class='alert alert-dismissible alert-danger'>
                            <button type='button' class='close' data-dismiss='alert'>x</button>
                            <p>Parece que ha habido un error. Recargue la página e inténtelo nuevamente.</p>
                          </div>
                    " );
                }
            }
        }
    }else{
        echo '<div class="alert alert-dismissible alert-warning">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    <p><strong>ERROR!</strong> debes seleccionar una imagen.</p>
                  </div>';
    }