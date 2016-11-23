<?php
require_once 'models/class.conection.php';
require_once 'models/class.consultations.php';
session_start();

if(!isset($_SESSION['users']))
{
    echo '<div class="alert alert-dismissible alert-info">
           <button type="button" class="close" data-dismiss="alert">x</button>
           <strong>Inicia sesión: <a href="#" target="_blank" data-toggle="modal" data-target="#reginm">aquí</a> </strong> para poder publicar inmuebles.
          </div>';
}else{
    $modelo = new Conection();
    $connect = $modelo->get_conection();
    $stm = $connect->prepare("SELECT * FROM usuarios WHERE id = :uid ");
    $stm->execute(array(":uid"=>$_SESSION['users']));
    $row = $stm->fetch(PDO::FETCH_ASSOC);
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
<!-- Fin Modal Login-->

<!--    Slider-->
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

<!--        Controles de navegación-->
        <ul id="control-buttons" class="control-buttons"></ul>
    </section>
<!--    Fin Slider-->

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
            echo '
                <div class="columnRight">
                    <p style="text-align: center;font-weight: bold;font-size: 16px;">Perfíl</p>
                    <img style="width:200px;height:150px;" src="img/img.jpg">
                    <p><strong>Nombre:</strong> '.$row['nombre'].'</p>
                    <p><strong>Cedula:</strong> '.$row['cedula'].'</p>
                    <p><strong>Telefono:</strong> '.$row['telefono'].'</p>
                    <p><strong>Celular:</strong> '.$row['celular'].'</p>
                    <p><strong>E-Mail:</strong> '.$row['email'].'</p>
                </div>
            ';
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
                        <input type="text" id="user" value="'.$row['id'].'" class="form-control" required>
                    </div>
                    <br>
                    <center >
                        <div class="input-group" >
                            <button type = "button" onclick="sendDate()" class="btn btn-default btn-success btn-block" >Ok!</button>
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
                <div role="form" class="main" onkeypress="return EnterRunRegInm(event)" enctype="multipart/form-data">
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
                        <input type="text" id="numero_pisos" class="form-control" placeholder="Ej: la cantidad de plantas que tiene la casa ( 2 pisos o 2 plantas)." required>
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon">Cantidad de baños:</span>
                        <input type="text" id="cantidad_bano" class="form-control" placeholder="Ej: la cantidad de baños en el área construida." required>
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
                        <input type="text" id="precio" class="form-control" placeholder="Ej: el precio que pide el usuario por el inmueble" required>
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon">Fotos:</span>
                        <input type="file" id="fotos" class="form-control" required multiple/>
                    </div>
                    <br>
                        <center><button type="button" class="btn btn-default" onclick="registerInm();">Enviar</button></center>
                    <span id="_AJAX_INM_"></span>
                </div >
            </div >
            <div class="modal-footer" >
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div >
        </div >
    </div >
</div >
<!--Fin Modeal Registro-->
                    <br><br>
                </div>
                </div>
            ';
            echo '</section>';
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
    <script src="js/reg.js"></script>
    <script src="js/ing.js"></script>
    <script src="js/datesupporte.js"></script>
    <script src="js/dateinm.js"></script>
</body>
</html>