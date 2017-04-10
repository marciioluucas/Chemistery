<?php
require_once "../controller/ProdutoController.php";
require_once "../controller/ConfSistemaController.php";
$confSistemaController = new ConfSistemaController();
$produtoController = new ProdutoController();
$toString = "";

?>
<!DOCTYPE html>
<html lang="pt-br" class="">
<head>
    <meta charset="UTF-8">
    <title><?php echo $produtoController->retornaAlgoDoProdutoQueEuQueira("nome", $_GET['id']); ?></title>
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
    <!-- bootstrap wysihtml5 - text editor -->

    <!--    Icone-->
    <link rel="shortcut icon" href="../favicon.ico"/>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        img {
            max-width: 100%;
            /*padding: 10px;*/
            /*border: 1px solid #ccc;*/
            background: #fff;
            /*box-shadow: 1px 1px 7px rgba(0, 0, 0, 0.1);*/
            height: auto;
            width: auto;
            max-height: 390px;

            /*width: 374px;*/
            /*height: 367px;*/
        }

        .divcontainer {
            height: 367px;
            width: 374px;
            display: flex;
            display: -webkit-flex; /* Garante compatibilidade com navegador Safari. */
            text-align: center;
            justify-content: center;
            align-items: center;
            border: 1px solid #CDCDCD;
            padding: 10px;
            margin-left: 20px;
        }

        .img {
            margin-top: 10px;
            margin-bottom: 10px;

        }

        h1 {
            font-size: 3em;
            line-height: 1;
            margin-bottom: 0.5em;
        }

        p {
            margin-bottom: 1.5em;
        }


        .main-image {
            margin-bottom: 0.75em;
        }
    </style>
</head>
<body>
<div class="" style="">

    <div class="row">
        <div class="col-sm-5">


            <div class="main-image divcontainer" id="imgPrincipal">

                <img
                        src="../imagens/<?php echo strtolower($produtoController->retornaAlgoDoProdutoQueEuQueira("imagemprincipal", $_GET['id'])); ?>"
                        alt="Placeholder"
                        class="custom img-responsive img"
                        style="">
            </div>

        </div>
        <div class="col-sm-6"><h2 style="color: <?php echo $confSistemaController->retornaCor(); ?>">
                <b><?php echo $produtoController->retornaAlgoDoProdutoQueEuQueira("nome", $_GET['id']) ?></b></h2>
            <hr>
        </div>
        <div class="col-sm-6" style="padding-left: 50px">


            <button type="button" class="btn btn-lg btn-info btnAbreModalPergunta">Tirar uma dúvida</button>

            <h3>(TODO)Precauções(TODO)</h3>


            <table style="width: 100%; border-color: #FFFFFF; border: none" border="1">
                <?php

                $produtoController->retornaAtributoDosProdutos($_GET['id'], $produtoController->retornaAlgoDoProdutoQueEuQueira("categoria_id", $_GET['id']));
                ?>
            </table>
        </div>


        <div class="col-sm-12">

            <hr>
            <div class="container" style="text-align: justify">
                <h2>Descrição</h2>
                <p class="h3"><?php echo $produtoController->retornaAlgoDoProdutoQueEuQueira("descricao", $_GET['id']) ?></p>
                <br><br>
            </div>
            <hr>
            <br><br>

        </div>
    </div>
</div>
<div id="modalPergunta" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Fazer uma pergunta</h4>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
            </div>
        </div>

    </div>
</div>

<script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script>

    $('.btnAbreModalPergunta').click(function () {
        $('#modalPergunta').modal();
        $('.modal-body').load('frmCadastroPergunta.php?id=<?php echo $_GET['id']; ?>');
    });


</script>
<!-- page script -->
</body>
</html>