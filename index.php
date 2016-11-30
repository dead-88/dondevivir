<?php
    require_once 'models/class.conection.php';
    require_once 'models/class.consultations.php';

session_start();

if(!isset($_SESSION['users']))
{
    echo '<div class="alert alert-dismissible alert-info">
           <button type="button" class="close" data-dismiss="alert">x</button>
           <strong>Inicia sesión <a href="#" target="_blank" data-toggle="modal" data-target="#reginm">aquí,</a> </strong> para poder publicar inmuebles.
          </div>';
}else {
    $modelo = new Conection();
    $connect = $modelo->get_conection();
    $stm = $connect->prepare("SELECT * FROM usuarios WHERE id_usuario = :uid ");
    $stm->execute(array(":uid" => $_SESSION['users']));
    $row = $stm->fetch(PDO::FETCH_ASSOC);
}
if(isset($_SESSION['contador']))
{
    $_SESSION['contador'] = $_SESSION['contador'] + 1;
    $mensaje = '<p class="text-success text-center text-capitalize">nos has visitado: ' . $_SESSION['contador'] . ' veces, te aseguro que ecnontraras tu inmueble aquí.</p>';
}else {
    $_SESSION['contador'] = 1;
    $mensaje = '<h4 class="text-center text-capitalize text-success">Bienvenido a nuestra página de inmuebles<h4>';
}

?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DondeVivir</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/ei-slider.css">
    <link rel="stylesheet" href="fonts/flaticon.css">
    <link rel="stylesheet" href="css/font-awesome.css">
</head>
<body>
<!-- Cabezera-->
<header>
        <div class="wrapper">
            <a href="index.php">
                <img src="img/img-topic--asset-management-2_560_360_s_c1.png" id="logo" alt="Donde vivir cucúta">
            </a>
            <div class="headerContent">
                <div class="buscadorMenu">
                    <div class="menu">
                        <ul class="submenu">
                            <li>
                                <a href="index.php">
                                    <img src="img/ico_CasaInicio.png" alt="Inicio vivir">
                                </a>
                            </li>
                            <li><a href="#">INMOBILIARIA</a></li>
                            <?php
                                if(!isset($_SESSION['users'])){
                                    echo '<li><a href="#" data-toggle="modal" data-target="#reg">REGISTRATE</a></li>';
                                    echo '<li><a href="#" data-toggle="modal" data-target="#reginm">SIGN IN</a></li>';
                                }else{
                                    echo '<li><a href="controllers/close.php">SIGN OUT</a></li>';
                                }
                            ?>
                        </ul>
                        <ul class="submenu menubottom">
                            <li><a href="#">BUSCAR CASA</a></li>
                            <li><a href="#">F.A.Q</a></li>
                            <li><a href="#">CONTACTENOS</a></li>
                        </ul>
                    </div>
                </div>
                <div class="buscador">
                    <form action="#" method="get">
                        <input type="text" class="buscar" name="search" placeholder="Buscar...">
                        <input type="submit" value="">
                    </form>
                </div>
            </div>
        </div>
    </header>
<?php echo '<p class="text-center text-capitalize text-success">'.$mensaje.'</p>'; ?>
<!-- Fin Cabezera-->

<!-- Modal Registro-->
<div id="reg" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Registrate Es Completamente gratis.</h4>
            </div>
            <div class="modal-body">
                <p class="text-center">Disfruta de DondeVivir.com tú inmobiliaria.</p>
                <h3 class="text-center text-danger text-capitalize">Registrarme</h3>
                <span id="_AJAX_REG_"></span>
                <div role="form" class="main" onkeypress="return EnterRunReg(event)">
                    <div class="input-group">
                        <span class="input-group-addon">Nombre:</span>
                        <input type="text" id="name" class="form-control" placeholder="Ingresa su nombre completo" required>
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon">N° Cedúla</span>
                        <input type="number" id="cedula" maxlength="10" minlength="10" class="form-control" placeholder="C.C" required>
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon">N° Teléfono</span>
                        <input type="number" id="telf" maxlength="10" minlength="10" class="form-control" placeholder="Ej: +57 246257" required>
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon">N° Celular</span>
                        <input type="number" id="cel" maxlength="10" minlength="10" class="form-control" placeholder="Ej: +57 3001234567" required>
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon">E-Mail <span class="glyphicon glyphicon-envelope"></span></span>
                        <input pattern="^[-!#$%&\'*+\\./0-9=?A-Z^_`a-z{|}~]+@[-!#$%&\'*+\\/0-9=?A-Z^_`a-z{|}~]+\.[-!#$%&\'*+\\./0-9=?A-Z^_`a-z{|}~]+$" type="email" id="email" maxlength="30" minlength="10" class="form-control" placeholder="Example@ej.com" required>
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon">Contraseña</span>
                        <input type="password" id="pass" class="form-control" placeholder="Ingresa aquí tu contraseña" required>
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon">Repite tú contraseña</span>
                        <input type="password" id="r_pass" class="form-control" placeholder="Ingresa aquí tu contraseña nuevamente" required>
                    </div>
                    <br>
                    <div class="input-group">
                        <label><input type="checkbox" id="tyc" value="1" checked> Acepto los T&C</label>
                    </div>
                    <br>
                    <center>
                        <div class="input-group">
                            <button type="button" onclick="RegUser()" class="btn btn-default btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Registrarme</button>
                        </div>
                    </center>
                    <p class="text-right text-info"><a href="#" data-target="#reginm" data-toggle="modal">Ya estoy registrado!</a></p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Fin Modeal Registro-->

<!-- Modal Login-->
<div id="reginm" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Acceder a la inmobiliaria.</h4>
                </div>
                <div class="modal-body">
                    <h3 class="text-center text-info">Ingresar a DondeVivir.com</h3>
                    <span id="_AJAX_USER_"></span>
                    <div class="main" role="form" onkeypress="return EnterKeyboard(event)">
                        <div class="input-group">
                            <span class="input-group-addon">Login</span>
                            <input type="text" id="login" class="form-control" placeholder="Ingresa tú cedula o email">
                        </div>
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon">Password</span>
                            <input type="password" id="password" class="form-control" placeholder="Ingresa tú contraseña">
                        </div>
                        <br>
                        <center>
                            <div class="input-group">
                                <button type="button" onclick="acces()" class="btn btn-success">Sing In</button>
                            </div>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!--Fin Modal Login-->

<!--Slider-->
    <section id="slider" class="sect">
        <ul class="slider-wrapper">
            <li class="current-slide">
                <img src="img/Slide_01.jpg" alt="Donde Vivir">
                <div class="caption">
                    <h2 class="slider-title">Donde Vivir Cucúta</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias animi asperiores consequuntur ea facilis magni, nam non, possimus quisquam saepe tempore, voluptatem. Aliquid distinctio maiores minima mollitia quis veniam voluptates!</p>
                </div>
            </li>
            <li>
                <img src="img/61640-helen-yates-029.jpg" alt="Donde vivir">
                <div class="caption">
                    <h2 class="slider-title">Donde Vivir Colombía</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A alias beatae dolor enim et exercitationem fugiat, libero, non pariatur quas quos suscipit totam voluptas! Adipisci nam nulla quia sapiente sed.</p>
                </div>
            </li>
            <li>
                <img src="img/img.jpg" alt="Donde vivir">
                <div class="caption">
                    <h2 class="slider-title">Donde Vivir Colombía</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A alias beatae dolor enim et exercitationem fugiat, libero, non pariatur quas quos suscipit totam voluptas! Adipisci nam nulla quia sapiente sed.</p>
                </div>
            </li>
            <li>
                <img src="img/68929-ison-160217-westdean-53280.jpg" alt="Donde vivir">
                <div class="caption">
                    <h2 class="slider-title">Donde Vivir Colombía</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A alias beatae dolor enim et exercitationem fugiat, libero, non pariatur quas quos suscipit totam voluptas! Adipisci nam nulla quia sapiente sed.</p>
                </div>
            </li>
        </ul>
        <!--Sombras-->
        <div class="slider-shadow"></div>
        <!--Controles de navegación-->
        <ul id="control-buttons" class="control-buttons"></ul>
    </section>
<!--Fin Slider-->

    <?php
        if(!isset($_SESSION['users'])){
            echo '
                <section class="wrapper main clearfix">
        <div class="columnRight">
            <a href="#" target="_blank">
                <img src="http://homelos.com/wp-content/uploads/2016/08/modest-for-bathroom-design-trends-in-style-and-hd-image-v1fl.jpg" alt="Read error">
            </a>
        </div>
        <div class="columnLeft">
            <div class="selector">
                <a href="" class="btn" id="btnVenta">PROPIEDAD EN VENTA</a>
                <a href="" class="btn" id="btnRenta">PROPIEDADES EN RENTA</a>
                <div class="clearfix"></div>
                <div class="venta">
                    <div class="Items">
                        <div class="first">
                            <table class="tableItems">
                                <tbody>
                                    <tr>
                                        <td colspan="2">
                                            <div class="fotoItem">
                                                <a href="#">
                                                    <img src="img/Slide_01.jpg" alt="Read error">
                                                </a>
                                            </div>
                                            <div class="DetallesItem">
                                                <a href="#">
                                                    <p>Casa venta</p>
                                                    <table>
                                                        <tbody>
                                                        <tr>
                                                            <td>Contrucción: 52 m°</td>
                                                            <td>Baños: 3</td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="first">
                            <table class="tableItems">
                                <tbody>
                                <tr>
                                    <td colspan="2">
                                        <div class="fotoItem">
                                            <a href="#">
                                                <img src="img/Slide_01.jpg" alt="Read error">
                                            </a>
                                        </div>
                                        <div class="DetallesItem">
                                            <a href="#">
                                                <p>Casa venta</p>
                                                <table>
                                                    <tbody>
                                                    <tr>
                                                        <td>Contrucción: 52 m°</td>
                                                        <td>Baños: 3</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="first">
                            <table class="tableItems">
                                <tbody>
                                <tr>
                                    <td colspan="2">
                                        <div class="fotoItem">
                                            <a href="#">
                                                <img src="img/Slide_01.jpg" alt="Read error">
                                            </a>
                                        </div>
                                        <div class="DetallesItem">
                                            <a href="#">
                                                <p>Casa venta</p>
                                                <table>
                                                    <tbody>
                                                    <tr>
                                                        <td>Contrucción: 52 m°</td>
                                                        <td>Baños: 3</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="first">
                            <table class="tableItems">
                                <tbody>
                                <tr>
                                    <td colspan="2">
                                        <div class="fotoItem">
                                            <a href="#">
                                                <img src="img/Slide_01.jpg" alt="Read error">
                                            </a>
                                        </div>
                                        <div class="DetallesItem">
                                            <a href="#">
                                                <p>Casa venta</p>
                                                <table>
                                                    <tbody>
                                                    <tr>
                                                        <td>Contrucción: 52 m°</td>
                                                        <td>Baños: 3</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
                ';
        }else{
            echo '<section class="wrapper main clearfix">';
            echo '<div class="columnRight text-capitalize">';
            echo '<p style="text-align: center;font-weight: bold;font-size: 16px;">.::Mí Perfil::.</p>';
            echo '<img style="width:200px;height:150px;" src="data:image/*;base64,'.base64_encode($row['foto']).'" class="viewPhoto" />';

            echo '<form accept-charset="utf-8" method="POST" id="enviarimagenes" enctype="multipart/form-data" >
                        <input type="file" name="imagen" id="file-1" class="inputfile inputfile-1" data-multiple-caption="{count} archivos seleccionados" multiple />
                        <label for="file-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="iborrainputfile" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path></svg>
                            <span class="iborrainputfile">Seleccionar Foto</span>
                        </label>
                        <button type="submit">Enviar</button>
                  </form>';
             echo '
                    <p><strong>Nombre:</strong> '.$row['nombre'].'</p>
                    <p><strong>Cedula:</strong> '.$row['cedula'].'</p>
                    <p><strong>Telefono:</strong> +57 '.$row['telefono'].'</p>
                    <p><strong>Celular:</strong> '.$row['celular'].'</p>
                    <p><strong>E-Mail:</strong> '.$row['email'].'</p>
                <hr>
                   <div id="mensaje"></div>
                <hr>
                </div>';
            echo '
                <div class="columnLeft wrapper container">
                <div role="form" onkeypress="return keyPress(event)">
                <h2 class="text-center">¿Qué días estás disponible?</h2>
                    <div class="input-group">
                        <span class="input-group-addon">De que horas a qué hora?</span>
                        <input type="text" id="inicio" class="form-control" placeholder="Ej: 10 am." required>
                        <center><b class="text-info">A</b></center>
                        <input type="text" id="fin" class="form-control" placeholder="5 pm." required>
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon">¿Día de la semana?</span>
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon">¿Día disponible?</span>
                        <input type="date" id="dia" class="form-control" placeholder="Ej: Lunes, Martes, Miercoles, ,Jueves, Viernes, Sabado,Domingo" required>
                    </div>
                    <div class="input-group hidden">
                        <input type="text" id="user" value="'.$row['id_usuario'].'" class="form-control" required>
                    </div>
                    <br>
                    <center >
                        <div class="input-group" >
                            <button type="button" onclick="sendDate()" class="btn btn-default btn-success btn-block" >Ok!</button>
                            <br>
                        </div >
                        <span id="_AJAX_DATE_"></span>
                    </center >
                </div >
                <div class="">
                    <h3 class="text-center">Registar mí inmueble</h3>
                    <a class="btn btn-danger" style="width: 100%;" data-toggle="modal" data-target="#regInm">Registar</a>
                    
<!-- Modal Registro-->
<div id="regInm" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Registrate Tú Inmueble.</h4>
            </div>
            <div class="modal-body">
                <p>Registra, Vende & Alquila....</p>
                <h3 class="text-center">Excelente día '.$row['nombre'].'</h3>
                <div role="form" class="main" onkeypress="return EnterRunRegInm(event)">
                    <div class="input-group">
                        <input type="hidden" id="user" value="'.$_SESSION['users'].'">
                        <span class="input-group-addon">Categoria:</span>
                        <select id="select">
                            <option value="apartamento">Apartamento</option>
                            <option value="casa">Casa</option>
                            <option value="habitación">Habitación</option>
                            <option value="local">Local</option>
                            <option value="bodega">Bodega</option>
                            <option value="lote">Lote</option>
                        </select>
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon">Estado de la vivienda:</span>
                        <input type="text" id="estado" class="form-control" placeholder="Ej: Sobre planos, Obra negra, Con acabados, No construido." required>
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon">Tipo de piso:</span>
                        <input type="text" id="tipo_piso" class="form-control" placeholder="Ej: Tierra, concreto, cerámica, mármol, granito, tableta." required>
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon">Área del terreno:</span>
                        <input type="text" id="ancho_terreno" class="form-control" placeholder="Ej: Ancho en metros." required>
                        <input type="text" id="largo_terreno" class="form-control" placeholder="Ej: Largo en metros." required>
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon">Tipo de pared:</span>
                        <input type="text" id="tipo_pared" class="form-control" placeholder="Ej: No tiene, Concreto, ladrillo, bloque, otro. " required>
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon">Número de pisos:</span>
                        <input type="number" id="numero_pisos" class="form-control" placeholder="Ej: la cantidad de plantas que tiene la casa ( 2 pisos o 2 plantas)." required>
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon">Cantidad de baños:</span>
                        <input type="number" id="cantidad_bano" class="form-control" placeholder="Ej: la cantidad de baños en el área construida." required>
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon">Ubicación:</span>
                        <input type="text" id="ubicacion" class="form-control" placeholder="Ej: Zona urbana, Zona rural" required>
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon">Dirección:</span>
                        <input type="text" id="direccion" class="form-control" placeholder="Ej: la dirección donde está ubicado el inmueble." required>
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon">Precio:</span>
                        <input type="number" id="precio" class="form-control" placeholder="Ej: el precio que pide el usuario por el inmueble" required>
                    </div>
                    <br>
                    <br>
                    <br>
                        <center><button type="button" class="btn btn-default" id="subir" onclick="registerInm();">Enviar</button></center>
                    <span id="_AJAX_INM_"></span>
                </div >
            </div >
            <div class="modal-footer" >
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div >
    </div >
</div >
<!--Fin Modeal Registro-->

                    <br><br>
                </div>
                    <form class="content" id="formularioPhoto">
                        <h3 class="text-center">Fotos Del Inmueble:</h3>
                        <ul class="photos">
                            <li>
                                <input type="file" id="archivo1" name="file[]" required>
                                <div id="photo-1" class="link"></div>
                                <div id="cerrar-photo-1" class="cerrar-photo"></div>
                            </li>
                            <li>
                                <input type="file" id="archivo2" name="file[]" required>
                                <div id="photo-2" class="link"></div>
                                <div id="cerrar-photo-2" class="cerrar-photo"></div>
                            </li>
                            <li>
                                <input type="file" id="archivo3" name="file[]" required>
                                <div id="photo-3" class="link"></div>
                                <div id="cerrar-photo-3" class="cerrar-photo"></div>
                            </li>
                            <li>
                                <input type="file" id="archivo4" name="file[]" required>
                                <div id="photo-4" class="link"></div>
                                <div id="cerrar-photo-4" class="cerrar-photo"></div>
                            </li>
                            <li>
                                <input type="file" id="archivo5" name="file[]" required>
                                <div id="photo-5" class="link"></div>
                                <div id="cerrar-photo-5" class="cerrar-photo"></div>
                            </li>
                            <li>
                                <input type="file" id="archivo6" name="file[]" required>
                                <div id="photo-6" class="link"></div>
                                <div id="cerrar-photo-6" class="cerrar-photo"></div>
                            </li>
                            <li>
                                <input type="file" id="archivo7" name="file[]" required>
                                <div id="photo-7" class="link"></div>
                                <div id="cerrar-photo-7" class="cerrar-photo"></div>
                            </li>
                            <li>
                                <input type="file" id="archivo8" name="file[]" required>
                                <div id="photo-8" class="link"></div>
                                <div id="cerrar-photo-8" class="cerrar-photo"></div>
                            </li>
                            <li>
                                <input type="file" id="archivo9" name="file[]" required>
                                <div id="photo-9" class="link"></div>
                                <div id="cerrar-photo-9" class="cerrar-photo"></div>
                            </li>
                            <li>
                                <input type="file" id="archivo10" name="file[]" required>
                                <div id="photo-10" class="link"></div>
                                <div id="cerrar-photo-10" class="cerrar-photo"></div>
                            </li>
                              <!--BARRA DE PROGRESO-->
                                <center>
                                    <div class="progress">
                                        <div class="bar"></div >
                                        <div class="percent">0%</div >
                                    </div>
                                </center>
                             <!--FIN BARRA DE PROGRESO-->
                             <div class="msj"></div>
                                <div id="resultado"></div>
                        </ul>
                    </form>
                </div>
            ';

            echo '</section>';
        }
    ?>

<?php

if(isset($_SESSION['users'])){

    $consulta = "SELECT * FROM fotos";
    $resultado = $connect->query($consulta);

    while ($datos = $resultado->fetch(PDO::FETCH_ASSOC)) {

    echo '<div id="resultados">';
    echo '<p><b>Imagen:</b></p>';
    echo '<img src="data:image/*;base64,'.base64_encode($datos['url_foto']).'" class="viewPhoto" />';
    echo '</div><hr>';
  }
}
?>

    <footer>
        <div class="wrapper">
            <div class="bottomMenu">
                <ul>
                    <li><a href="#">INICIO</a></li>
                    <li><a href="#">INMOBILIARIA</a></li>
                    <li><a href="#">CONSTRUCTORAS</a></li>
                    <li><a href="#">BUSCAR CASA</a></li>
                    <li><a href="#">CONTACTO</a></li>
                </ul>
            </div>
            <div class="redSocial">
                <a href="#" target="_blank"></a>
                <a href="#" target="_blank"></a>
            </div>
            <p class="pFooter">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis ducimus ex impedit maiores mollitia odit, quod. Ab accusantium cupiditate hic quas quisquam rem sequi? A esse modi mollitia perferendis quidem. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci, alias consequatur corporis delectus dolor eaque eius eligendi est harum, in incidunt ipsam omnis placeat quae sapiente, veniam vitae voluptate voluptatem.</p>
            <p class="bottomP">Copytight &copy; <?php echo date("Y")?> Informatic-Death By Deiber Mejia Lopez</p>
        </div>
        <div class="clearfix"></div>
    </footer>
<script src="js/jquery-1.12.4.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/slider.js"></script>
    <script src="js/jquery.form.js"></script>
    <script src="js/reg.js"></script>
    <script src="js/ing.js"></script>
    <script src="js/datesupporte.js"></script>
    <script src="js/dateinm.js"></script>
    <script src="js/upload.js"></script>
<script>
    $("#enviarimagenes").on("submit", function(e){
        e.preventDefault();
        var formData = new FormData(document.getElementById("enviarimagenes"));

        $.ajax({
            url: "controllers/upload.php",
            type: "POST",
            dataType: "HTML",
            data: formData,
            cache: false,
            contentType: false,
            processData: false
        }).done(function(echo){
            $("#mensaje").html(echo);
        });
    });
</script>
<script>
    var inputs = document.querySelectorAll( '.inputfile' );
    Array.prototype.forEach.call( inputs, function( input )
    {
        var label	 = input.nextElementSibling,
            labelVal = label.innerHTML;

        input.addEventListener( 'change', function( e )
        {
            var fileName = '';
            if( this.files && this.files.length > 1 )
                fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
            else
                fileName = e.target.value.split( '\' ).pop();

            if( fileName )
                label.querySelector( 'span' ).innerHTML = fileName;
            else
                label.innerHTML = labelVal;
        });
    });
</script>
</body>
</html>