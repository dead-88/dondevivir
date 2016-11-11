<?php
require_once 'models/class.conection.php';
session_start();
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
    <header>
        <div class="wrapper">
            <a href="index.php">
                <img src="http://casasbaratasencuenca.com/wp-content/uploads/2014/04/casas.png" id="logo" alt="Donde vivir cucúta">
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
<!-- Modal -->
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
                        <span class="input-group-addon">Nombre</span>
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

    <!-- Modal -->
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
                <img src="img/Slide_02.jpg" alt="Donde vivir">
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
            echo '
                <div class="wrapper">
                    <span id="_AJAX_REG_"></span>
                <div role="form" class="main" onkeypress="return EnterRunReg(event)">
                    <div class="input-group">
                        <span class="input-group-addon">Nombre</span>
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
                        <input type="email" id="email" maxlength="30" minlength="10" class="form-control" placeholder="Example@ej.com" required>
                    </div >
                    <br >
                    <div class="input-group" >
                        <label ><input type = "checkbox" id = "tyc" value = "1" checked >Acepto los T & C </label >
                    </div >
                    <br >
                    <center >
                        <div class="input-group" >
                            <button type = "button" onclick = "RegUser()" class="btn btn-default btn-success btn-block" ><span class="glyphicon glyphicon-off" ></span > Registrarme</button >
                        </div >
                    </center >
                </div >
                </div>
            ';
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
</body>
</html>