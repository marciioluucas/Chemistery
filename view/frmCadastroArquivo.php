<?php
/**
 * Created by PhpStorm.
 * User: Marcio Lucas
 * Date: 10/03/2016
 * Time: 15:07
 */

require_once "protecaoPaginas.php";
if ($_SESSION["tempo"] < time()) {
    echo "<script>window.location.replace('lockscreen.php')</script>";
}else{
    $_SESSION["tempo"] = time() + 600;
}

require_once "../controller/ClienteController.php";
$clienteController = new ClienteController();
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
    <!-- Icone-->

    <link rel="stylesheet" href="../plugins/select2/select2.css">
    <link rel="shortcut icon" href="../favicon.ico" />
    <link rel="stylesheet" href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>


        body {
            background-color: #ecf0f5;
        }

        .onoffswitch {
            position: relative;
            width: 90px;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
        }

        .onoffswitch-checkbox {
            display: none;
        }

        .onoffswitch-label {
            display: block;
            overflow: hidden;
            cursor: pointer;
            height: 30px;
            padding: 0;
            line-height: 30px;
            border: 2px solid #999999;
            border-radius: 30px;
            background-color: #EEEEEE;
            transition: background-color 0.3s ease-in;
        }

        .onoffswitch-label:before {
            content: "";
            display: block;
            width: 30px;
            margin: 0px;
            background: #FFFFFF;
            position: absolute;
            top: 0;
            bottom: 0;
            right: 58px;
            border: 2px solid #999999;
            border-radius: 30px;
            transition: all 0.3s ease-in 0s;
        }

        .onoffswitch-checkbox:checked + .onoffswitch-label {
            background-color: #3588CC;
        }

        .onoffswitch-checkbox:checked + .onoffswitch-label, .onoffswitch-checkbox:checked + .onoffswitch-label:before {
            border-color: #3588CC;
        }

        .onoffswitch-checkbox:checked + .onoffswitch-label:before {
            right: 0px;
        }

        .select2-selection {
            border-color: #d2d6de !important;
        }

        .select2-selection--single {
            border-color: #d2d6de !important;
        }
    </style>
</head>
<body>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Upload
            <small>de arquivo</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="">Upload</li>
            <li class="">Upload de arquivos</li>
        </ol>
    </section>
    <div>

        <form action="../controller/ArquivoController.php" method="post" enctype="multipart/form-data"
              id="frmCadastroArquivo">
            <input type="text" name="b" id="b" value="cadastrar" hidden="hidden">
            <div class="box-body">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="usuarioNome">Identificação</label>
                        <input type="text" class="form-control" id="arquivoIdentificacao" name="arquivoIdentificacao" required
                               placeholder="Coloque aqui a identificação">
                    </div>
                    <div class="form-group">
                        <label for="arquivoUpload">Arquivos da análise</label>
                        <input type="file" class="form-control" id="arquivoBoletim" name="arquivoUpload" required>
                        <p class="help-block">Por favor, envie arquivos de no máximo 32MB</p>
                    </div>

                    <div class="form-group">
                        <label for="arquivoEmpresa">Empresa</label>
                        <div class="input-group" style="margin-top: -3px !important;">
                            <span class="input-group-addon" id="Lupa" style="height: 34px !important;"><i
                                    class="fa fa-search"
                                    aria-hidden="true"></i></span>
                            <select class="form-control select2"
                                    style="width: 100%; border-radius: 0 !important; display: none"
                                    id="produtoSecao" aria-describedby="Lupa" name="arquivoEmpresa">

                                <option selected="selected" value="0">Nenhuma</option>
                                <?php $clienteController->consultaClientes() ?>
                            </select>
                        </div>
                    </div><!-- /.form-group -->
                </div>


            </div>

            <!-- /.box-body -->

            <div class="col-lg-12 text-right">
                <a onclick="limparcampos();" class="btn btn-danger">Limpar campos</a>
                <input type="submit" class="btn btn-primary" name="enviar" id="enviar" value="Cadastrar">
            </div>

        </form>
    </div>
</div>
<!-- jQuery 2.1.4 -->
<script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="../bootstrap/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="../plugins/fastclick/fastclick.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>

<script src="js/jquery.wallform.min.js"></script>

<script src="js/jquery.onofff.min.js"></script>

<!--<script src="js/require.min.js"></script>-->


<script src="../plugins/select2/select2.full.min.js"></script>

<script>
    function limparcampos() {
        $('#frmCadastroArquivo').each(function () {
            this.reset();
        });
    }


    $(document).ready(function() {
        $(".select2").select2();
    });
</script>

</body>
</html>
