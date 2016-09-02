<?php
include_once "../controller/ProdutoController.php";
include_once "../controller/UsuarioController.php";
include_once "../controller/CategoriaController.php";
include_once "../controller/SecaoController.php";
$produtoController = new ProdutoController();
$usuarioController = new UsuarioController();
$categoriaController = new CategoriaController();
$secaoController = new SecaoController();

require_once "protecaoPaginas.php";
if ($_SESSION["tempo"] < time()) {
    echo "<script>window.location.replace('lockscreen.php')</script>";
} else {
    $_SESSION["tempo"] = time() + 600;
}
?>

<script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script>
    $(window).resize(function () {
        $("body").setHeight($(window).height());
    });
    $(window).load(function () {
        $('#preloader').hide();//1500 é a duração do efeito (1.5 seg)
        $('#preLoaderModal').modal('hide');
    });
</script>
<html>
<body>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small>Painel de Controle</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div id="dashboard">

            <div class="modal fade bs-example-modal-sm" role="dialog" id="preLoaderModal">
                        <div class="modal-dialog modal-sm" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Carregando...</h4>
                                </div>
                                <div class="modal-body">
                                    <div id="preloader" style="width: 100%; text-align: center"><img
                                            src="../sources/imgs/loading.gif" style="width: 80px;"><br>Carregando...
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>


            <!-- Small boxes (Stat box) -->
            <div class="row" style="z-index: 1 !important;">
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3><?php echo $produtoController->retornaNumProdutos(); ?></h3>
                            <p>Produtos cadastrados</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag" style=""></i>
                        </div>
                        <a href="../controller/ProdutoController.php?q=listar" target="iframePrincipal"
                           class="small-box-footer">Mais informações <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div><!-- ./col -->

                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3><?php echo $secaoController->retornaNumDeSecoes(); ?></h3>
                            <p>Seções cadastradas</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="../controller/SecaoController.php?q=listar" class="small-box-footer">Mais informações
                            <i
                                class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div><!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3><?php echo $usuarioController->retornaNumUsuarios() ?></h3>
                            <p>Usuários ativos
                                de <?php echo $usuarioController->retornaNumUsuariosComDesativados() ?></p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="../controller/UsuarioController.php?q=listar" class="small-box-footer">Mais informações
                            <i
                                class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div><!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3><?php echo $categoriaController->retornaNumeroDeCategoriasCadastradas() ?></h3>
                            <p>Categorias cadastradas</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="../controller/CategoriaController.php?q=listar" class="small-box-footer">Mais
                            informações
                            <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div><!-- ./col -->
            </div><!-- /.row -->
            <!-- Main row -->
            <div class="col-md-4">
                <!-- LINE CHART -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Produtos cadastrados nos ultimos 30 dias</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <!--                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> -->
                        </div>
                    </div>
                    <div class="box-body chart-responsive">
                        <div class="chart" id="line-chart1" style="height: 300px;"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <!-- LINE CHART -->
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Seções cadastradas nos ultimos 30 dias</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <!--                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> -->
                        </div>
                    </div>
                    <div class="box-body chart-responsive">
                        <div class="chart" id="line-chart2" style="height: 300px;"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <!-- LINE CHART -->
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <h3 class="box-title">Categorias cadastradas nos ultimos 30 dias</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <!--                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button> -->
                        </div>
                    </div>
                    <div class="box-body chart-responsive">
                        <div class="chart" id="line-chart3" style="height: 300px;"></div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>


</body>
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
    <style>
        .icon {
            margin-top: 7px;
        }
    </style>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
</html>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.5 -->
<script src="../bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="../plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="../plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="../plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="../plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="../plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../plugins/fastclick/fastclick.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>

<script>

    var line1 = new Morris.Line({
        element: 'line-chart1',
        resize: true,
        data: [
            <?php echo $produtoController->retornaUltimosProdutosCadastradosParaOGraficoDashboard(); ?>
        ],
        xkey: 'day',
        ykeys: ['valor'],
        labels: ['Produtos cadastrados'],
        lineColors: ['#3c8dbc'],
        hideHover: 'auto',
        parseTime: false
    });

    var line2 = new Morris.Line({
        element: 'line-chart2',
        resize: true,
        data: [
            <?php echo $produtoController->retornaUltimosSecoesCadastradasParaOGraficoDashboard(); ?>
        ],
        xkey: 'day',
        ykeys: ['valor'],
        labels: ['Seções cadastradas'],
        lineColors: ['#00a65a'],
        hideHover: 'auto',
        parseTime: false
    });

    var line3 = new Morris.Line({
        element: 'line-chart3',
        resize: true,
        data: [
            <?php echo $produtoController->retornaUltimosCategoriasCadastradasParaOGraficoDashboard(); ?>
        ],
        xkey: 'day',
        ykeys: ['valor'],
        labels: ['Categorias cadastradas'],
        lineColors: ['#dd4b39'],
        hideHover: 'auto',
        parseTime: false
    });

    $('#preLoaderModal').modal('show');


</script>