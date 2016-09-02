<?php
/**
 * Created by PhpStorm.
 * User: Marcio Lucas
 * Date: 24/03/2016
 * Time: 13:41
 */

require_once "protecaoPaginas.php";
require_once "../controller/UsuarioController.php";
$usuarioController = new UsuarioController();
if ($_SESSION["tempo"] < time() && $_GET['tela'] != "usrComum") {
    echo "<script>window.location.replace('lockscreen.php')</script>";
} else {
    $_SESSION["tempo"] = time() + 600;
}
?>
<html>

<head>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../plugins/iCheck/flat/blue.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="../plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="../plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="../plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <!-- Icone-->
    <link rel="shortcut icon" href="../favicon.ico"/>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
        body {
            background-color: transparent;
            margin: 0 auto
        }

        @media screen and (min-width: 1200px) {
            #row {
                margin-left: 13%
            }
        }


    </style>
</head>

<body class="content-wrapper container-fluid">
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row" style="z-index: 1 !important;">
        <div class="row" id="row">
            <div class="col-lg-10">
                <!-- Widget: user widget style 1 -->
                <div class="box box-widget widget-user">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-black"
                         style="background: url('../dist/img/photo1.png') center center no-repeat; background-size: cover; height: 280px; ">
                        <h3 class="widget-user-username"><?php echo $nomeUser; ?></h3>
                        <h5 class="widget-user-desc"><?php echo $nivelUser == 1 ? "Usuário comum" : "Administrador" ?></h5>
                    </div>
                    <div class="widget-user-image" style="margin-top: 50px">
                        <img class="img-circle img-responsive" style="width:150px; height: 150px;"
                             src="<?php echo $usuarioController->retornaAlgoUsuario("imagem", $idUser); ?>"
                             alt="User Avatar">
                    </div>
                    <?php
                    if ($_GET['tela'] != "usrComum") {
                        echo '<div class="box-footer">
                        <div class="row">
                            <div class="col-sm-4 border-right">
                                <div class="description-block">
                                    <h5 class="description-header">' . $dataCriacaoUser . '</h5>
                                    <span class="description-text">MEMBRO DESDE</span>
                                </div><!-- /.description-block -->
                            </div><!-- /.col -->
                            <div class="col-sm-4 border-right">
                                <div class="description-block">
                                    <h5 class="description-header">' . $usuarioController->consultaQuantosProdutosCadastradosPeloUsuario($idUser) . '</h5>
                                    <span class="description-text">PRODUTOS CADASTRADOS</span>
                                </div><!-- /.description-block -->
                            </div><!-- /.col -->
                            <div class="col-sm-4">
                                <div class="description-block">
                                    <h5 class="description-header">000</h5>
                                    <span class="description-text">PRODUTOS DESATIVADOS</span>
                                </div><!-- /.description-block -->
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div>';
                    } else {
                        echo '  
                            <div class="box-footer">
                                <div class="row">
                                    <div class="col-sm-12 border-right">
                                        <div class="description-block">
                                            <h5 class="description-header">' . $dataCriacaoUser . '</h5>
                                            <span class="description-text">MEMBRO DESDE</span>
                                        </div><!-- /.description-block -->
                                    </div><!-- /.col -->
                                </div>       
                            </div>';
                    }

                    ?>
                </div><!-- /.widget-user -->

            </div><!-- /.col -->
        </div>
    </div>
</section>
<!-- jQuery 2.1.4 -->
<script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="../bootstrap/js/bootstrap.min.js"></script>
<!-- Slimscroll -->
<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../plugins/fastclick/fastclick.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<script>
    $(window).resize(function () {
        $("body").setHeight($(window).height());
    });
</script>
</body>
</html>