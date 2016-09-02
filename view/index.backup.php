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
    <title>CataLOG v1.<?php
        $ponteiro = fopen("\\xampp\\htdocs\\CataLOG\\catalogv10\\versao", "r");

        feof($ponteiro);

        $linha = fgets($ponteiro, 4096);
        echo $linha;

        fclose($ponteiro)

        ?> | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="theme-color" content="#605ca8">
    <link rel="icon" sizes="192x192" href="../icon.png">
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
    <link rel="stylesheet" href="../plugins/iCheck/flat/purple.css">
    <!-- Morris chart -->
    <!--    <link rel="stylesheet" href="../plugins/morris/morris.css">-->
    <!-- jvectormap -->
    <!--    <link rel="stylesheet" href="../plugins/jvectormap/jquery-jvectormap-1.2.2.css">-->
    <!-- Date Picker -->
    <!--    <link rel="stylesheet" href="../plugins/datepicker/datepicker3.css">-->
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

        iframe {

            margin-top: 1%;
            position: fixed;
            width: 100%;
            background-color: #ecf0f5;
            height: 110%;
        }

        body {
            position: fixed;
            width: 100%;

        }

        #botaoNav {
            display: none;
        }

        @media screen and (max-width: 766px) {
            #botaoNav {
                display: block;
            }

            .iframe {
                padding-bottom: 180px !important;
            }

            .main-footer {
                width: 100% !important;
            }
        }
    </style>
</head>
<body class="hold-transition skin-blue sidebar-mini" onload="data()">
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="dashboard.php" target="iframePrincipal" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini">C<b>LOG</b></span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg">Cata<b>LOG</b><small> v.1.<?php
                    $ponteiro = fopen("\\xampp\\htdocs\\CataLOG\\catalogv10\\versao", "r");

                    feof($ponteiro);

                    $linha = fgets($ponteiro, 4096);
                    echo $linha;


                    fclose($ponteiro)

                    ?></small></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" id="botaoNav" data-toggle="offcanvas" role="button"
               onclick="diminuiMarginIframe()">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->

                    <!-- Notifications: style can be found in dropdown.less -->

                    <!-- Tasks: style can be found in dropdown.less -->

                    <!-- User Account: style can be found in dropdown.less -->
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
                                    <a href="perfil.php" target="iframePrincipal" class="btn btn-default btn-flat">
                                        Perfil</a>
                                </div>
                                <div class="col-xs-6 text-center">
                                    <a href="../controller/UsuarioController.php?p=deslogar"
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
                    <!-- Control Sidebar Toggle Button -->
                    <li>
                        <a href="../controller/UsuarioController.php?p=deslogar"><i class="fa fa-sign-out"></i></a>
                    </li>
                </ul>
            </div>
        </nav>


    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="<?php echo $usuarioController->retornaAlgoUsuario("imagem", $idUser); ?>"
                         class="img-circle" style="width: 45px; height: 45px;"
                         alt="User Image">
                </div>
                <div class="pull-left info">
                    <p><?php echo $nomeUser ?></p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>

            <!-- sidebar menu: : style can be found in sidebar.less -->
            <div>


                <ul class="sidebar-menu">
                    <li class="header text-center">MENU PRINCIPAL</li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-shopping-cart"></i> <span>Produtos</span> <i
                                class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="frmCadastroProduto.php" target="iframePrincipal"><i
                                        class="fa fa-cart-plus"></i> Cadastro de produtos</a>
                            </li>
                            <li><a href="../controller/ProdutoController.php?q=listar" target="iframePrincipal"><i
                                        class="fa fa-list-alt"></i> Listagem de produtos</a></li>
                            <li><a href=""
                                   target="iframePrincipal"><i class="fa fa-bars"></i> <span>Categorias</span><i
                                        class="fa fa-angle-left pull-right"></i></a>
                                <ul class="treeview-menu">
                                    <li>
                                        <a href="frmCadastroCategoria.php" target="iframePrincipal">
                                            <table>
                                                <tr>
                                                    <td><i class="fa fa-plus-circle"
                                                           style="height: 25px; padding-top: 4px"></i></td>
                                                    <td style="padding-left: 5px"><span>Cadastro de categorias</span>
                                                    </td>
                                                </tr>
                                            </table>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="../controller/CategoriaController.php?q=listar"
                                           target="iframePrincipal">
                                            <table>
                                                <tr>
                                                    <td><i class="fa fa-list-alt"
                                                           style="height: 25px; padding-top: 4px"></i></td>
                                                    <td style="padding-left: 5px"><span>Listagem de categorias</span>
                                                    </td>
                                                </tr>
                                            </table>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li><a href=""
                                   target="iframePrincipal"><i class="fa fa-bars"></i> <span>Seções</span><i
                                        class="fa fa-angle-left pull-right"></i></a>
                                <ul class="treeview-menu">
                                    <li>
                                        <a href="frmCadastroSecao.php" target="iframePrincipal">
                                            <table>
                                                <tr>
                                                    <td><i class="fa fa-plus-circle"
                                                           style="height: 25px; padding-top: 4px"></i></td>
                                                    <td style="padding-left: 5px"><span>Cadastro de seções</span></td>
                                                </tr>
                                            </table>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="../controller/SecaoController.php?q=listar" target="iframePrincipal">
                                            <table>
                                                <tr>
                                                    <td><i class="fa fa-list-alt"
                                                           style="height: 25px; padding-top: 4px"></i></td>
                                                    <td style="padding-left: 5px"><span>Listagem de seções</span></td>
                                                </tr>
                                            </table>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                        </ul>
                    </li>

                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-users"></i> <span>Usuários</span> <i
                                class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="frmCadastroUsuario.php"
                                   target="iframePrincipal"><i class="fa fa-user-plus"></i> Cadastro de
                                    usuários</a>
                            </li>
                            <li><a href="../controller/UsuarioController.php?q=listar" target="iframePrincipal"><i
                                        class="fa fa-list-alt"></i> Listagem de usuários</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-cogs"></i> <span>Opções</span> <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li>
                                <a href="perfil.php"
                                   target="iframePrincipal"><i class="fa fa-user"></i> <span>Conta</span></a>
                            </li>
                            <li>
                                <a href="#"
                                   target="iframePrincipal"><i class="fa fa-desktop"></i> <span>Tema</span><i
                                        class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    <li>
                                        <a href="#" data-skin="skin-blue">
                                            <table>
                                                <tr>
                                                    <td><i class="fa fa-eye btn btn-primary btn-xs"
                                                           style="height: 25px; padding-top: 4px"></i></td>
                                                    <td style="padding-left: 10px"><span>Azul e preto</span></td>
                                                </tr>
                                            </table>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" data-skin="skin-blue-light">
                                            <table>
                                                <tr>
                                                    <td><i class="fa fa-eye btn btn-primary btn-xs"
                                                           style="height: 25px; padding-top: 4px"></i></td>
                                                    <td style="padding-left: 10px"><span>Azul e branco</span></td>
                                                </tr>
                                            </table>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" data-skin="skin-yellow">
                                            <table>
                                                <tr>
                                                    <td><i class="fa fa-eye btn btn-warning btn-xs"
                                                           style="height: 25px; padding-top: 4px"></i></td>
                                                    <td style="padding-left: 10px"><span>Amarelo e preto</span></td>
                                                </tr>
                                            </table>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" data-skin="skin-yellow-light">
                                            <table>
                                                <tr>
                                                    <td><i class="fa fa-eye btn btn-warning btn-xs"
                                                           style="height: 25px; padding-top: 4px"></i></td>
                                                    <td style="padding-left: 10px"><span>Amarelo e branco</span></td>
                                                </tr>
                                            </table>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" data-skin="skin-purple">
                                            <table>
                                                <tr>
                                                    <td><i class="fa fa-eye btn bg-purple btn-xs"
                                                           style="height: 25px; padding-top: 4px"></i></td>
                                                    <td style="padding-left: 10px"><span>Roxo e preto</span></td>
                                                </tr>
                                            </table>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" data-skin="skin-purple-light">
                                            <table>
                                                <tr>
                                                    <td><i class="fa fa-eye btn bg-purple btn-xs"
                                                           style="height: 25px; padding-top: 4px"></i></td>
                                                    <td style="padding-left: 10px"><span>Roxo e branco</span></td>
                                                </tr>
                                            </table>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" data-skin="skin-red">
                                            <table>
                                                <tr>
                                                    <td><i class="fa fa-eye btn btn-danger btn-xs"
                                                           style="height: 25px; padding-top: 4px"></i></td>
                                                    <td style="padding-left: 10px"><span>Vermelho e preto</span></td>
                                                </tr>
                                            </table>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" data-skin="skin-red-light">
                                            <table>
                                                <tr>
                                                    <td><i class="fa fa-eye btn btn-danger btn-xs"
                                                           style="height: 25px; padding-top: 4px"></i></td>
                                                    <td style="padding-left: 10px"><span>Vermelho e branco</span></td>
                                                </tr>
                                            </table>
                                        </a>
                                    </li>

                                </ul>
                            </li>
                            <li>
                                <a href="#"
                                   target="iframePrincipal"><i class="fa fa-cog"></i> <span>Sistema</span><i
                                        class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    <li>
                                        <a href="frmAlterarImagemPadrao.php" target="iframePrincipal">
                                            <i class="fa fa-image"></i>
                                            <span>Imagem padrão</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="frmAlterarCorPadrao.php" target="iframePrincipal">
                                            <i class="fa fa-eye"></i>
                                            <span>Cor padrão</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>

        </section>
        <!-- /.sidebar -->
    </aside>
    <div class="content-wrapper" style="margin-left: 0 !important;">
        <div class="iframe">
            <iframe src="dashboard.php" id="iframePrincipal" name="iframePrincipal"
                    style=" border: none; padding-bottom: 190px !important">
            </iframe>
        </div>
        <footer class="main-footer" style="bottom: 0; position: fixed; width: 88%;
    ">

            <strong><b id="dataRodape"></b> Copyright &copy; <a href="http://www.gruposalatiel.com">Made by Márcio Lucas
                    - A
                    member
                    of Salatiel Group</a>.</strong> All rights reserved.
<span class="pull-right">

                <b>Versão 1.0.0.<?php
                    $ponteiro = fopen("\\xampp\\htdocs\\CataLOG\\catalogv10\\versao", "r");

                    feof($ponteiro);

                    $linha = fgets($ponteiro, 4096);
                    echo $linha . "</b>";

                    fclose($ponteiro)

                    ?>
</span>
        </footer>
    </div>
    <!-- Control Sidebar -->

    <div class="control-sidebar-bg"></div>
</div><!-- ./wrapper -->

<!-- jQuery 2.1.4 -->
<script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.5 -->
<script src="../bootstrap/js/bootstrap.min.js"></script>
<!--<!-- Morris.js charts -->-->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>-->
<!--<script src="../plugins/morris/morris.min.js"></script>-->
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
<!--<script src="../dist/js/pages/dashboard.js"></script>-->
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>

<script>
    $(document).ready(function () {
        var teste = 0;
        $("#botaoNav").click(function () {
            if (teste = 0) {
                document.getElementById("botaoNav").css("margin-top", "-85");
                teste = 1;
            }
            if (teste = 1) {
                document.getElementById("botaoNav").css("margin-top", "85");
            }
        })

    })
    function data() {
        var ano = new Date();
        document.getElementById("dataRodape").innerHTML = "2013 - " + ano.getFullYear();
    }


</script>
</body>
</html>