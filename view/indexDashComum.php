<?php
require_once "../view/protecaoPaginas.php";
require_once "../controller/UsuarioController.php";
$usuarioController = new UsuarioController();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Área do cliente | CataLOG</title>
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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-green layout-top-nav">
<div class="wrapper">

    <header class="main-header">
        <nav class="navbar navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <a href="#" class="navbar-brand">Cata<b>LOG</b></a>
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#navbar-collapse">
                        <i class="fa fa-bars"></i>
                    </button>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="#" id="home">Home <span class="sr-only"></span></a></li>
                        <li><a href="#" id="arquivos">Arquivos</a></li>

                    </ul>

                </div><!-- /.navbar-collapse -->
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">

                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="<?php echo $usuarioController->retornaAlgoUsuario("imagem", $idUser); ?>"
                                     class="user-image" alt="User Image">
                            <span
                                class="hidden-xs"><?php echo $usuarioController->retornaAlgoUsuario("nome", $idUser); ?></span>
                            </a>

                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="<?php echo $usuarioController->retornaAlgoUsuario("imagem", $idUser); ?>"
                                         class="img-circle" alt="User Image">
                                    <p>
                                        <?php echo $usuarioController->retornaAlgoUsuario("nome", $idUser); ?>
                                        - <?php echo ($usuarioController->retornaAlgoUsuario("nivel", $idUser) == 2) ? "Administrador" : "Usuário comum"; ?>
                                        <small>Membro
                                            desde <?php echo $usuarioController->retornaAlgoUsuario("datacriacao", $idUser); ?></small>
                                    </p>
                                </li>
                                <!-- Menu Body -->
                                <li class="user-body text-center">

                                    <div class="col-xs-6 text-center">
                                        <a href="#"  id="perfil" class="btn btn-default btn-flat">
                                            Perfil</a>
                                    </div>
                                    <div class="col-xs-6 text-center">
                                        <a href="../controller/UsuarioController.php?p=deslogar&tela=usrComum"
                                           class="btn btn-default btn-flat"> Sair</a>
                                    </div>

                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">

                                    </div>
                                </li>

                            </ul>
                        </li>
                        <li>
                            <a href="../controller/UsuarioController.php?p=deslogar&tela=usrComum"><i class="fa fa-sign-out"></i></a>
                        </li>
                    </ul>
                </div><!-- /.navbar-custom-menu -->
            </div><!-- /.container-fluid -->
        </nav>
    </header>
    <!-- Full Width Column -->
    <div class="content-wrapper">
        <div class="container">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Painel
                    <small>de controle</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Painel de controle</a></li>

                </ol>
            </section>

            <!-- Main content -->
            <section class="content" id="body">
                
            </section><!-- /.content -->
        </div><!-- /.container -->
    </div><!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="container">
            <div class="pull-right hidden-xs">
<!--                <b>Version</b> 2.3.0-->
            </div>
            <strong>CataLOG é uma marca de Grupo Salatiel &copy; 2013-2016 <a href="http://gruposalatiel.com">Grupo Salatiel</a>.</strong> All
            rights reserved.
        </div><!-- /.container -->
    </footer>
</div><!-- ./wrapper -->

<!-- jQuery 2.1.4 -->
<script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="../bootstrap/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../plugins/fastclick/fastclick.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>

<script>
    $('#arquivos').click(function(){
        $('#body').load("arquivos.php")
    });
    
    $('#home').click(function(){
        $('#body').load("dashComum.php");
    });

    $(function(){
        $('#body').load("dashComum.php");
    });

    $("#perfil").click(function(){
        $('#body').load("perfil.php?tela=usrComum");
    });



</script>
</body>
</html>
