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
                            <li><a href="#">CONSTRUCTORAS</a></li>
                            <li><a href="#" data-toggle="modal" data-target="#reg">REGISTRATE</a></li>
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
                <h4 class="modal-title">Modal Header</h4>
            </div>
            <div class="modal-body">
                <p>Some text in the modal.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
    <script src="js/index.js"></script>
</body>
</html>