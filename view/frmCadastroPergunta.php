<?php
/**
 * Created by PhpStorm.
 * User: Marcio Lucas
 * Date: 10/03/2016
 * Time: 15:07
 */

require_once "protecaoPaginas.php";
require_once "../controller/CategoriaController.php";
require_once "../controller/ProdutoController.php";

$categoriaController = new CategoriaController();
$produtoController = new ProdutoController();


if ($categoriaController->retornaNumeroDeCategoriasCadastradas() == 0) {
    echo "<script> window.location.href = '../erros/semCategoriasCadastradas.php'</script>";
}


if ($_SESSION["tempo"] < time()) {
    echo "<script>window.location.replace('lockscreen.php')</script>";
} else {
    $_SESSION["tempo"] = time() + 600;
}
if (isset($_GET['id'])) {
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
        <link rel="shortcut icon" href="../favicon.ico"/>


        <![endif]-->

        <style>


            body {
                background-color: #ecf0f5;
            }


        </style>
    </head>
    <body>
    <form action="../controller/PerguntaController.php?b=cadastrar" method="post" enctype="multipart/form-data"
          id="frmCadastroPergunta">
        <input type="text" name="b" id="b" value="cadastrar" hidden="hidden">
        <input type="text" name="idUsuarioLogado" id="idUsuarioLogado" value="<?php echo $idUser ?>"
               hidden="hidden">
        <div class="box-body">
            <div class="col-lg-12">
                <div class=" row thumbnail">
                    <img src="<?php echo $produtoController->retornaAlgoDoProdutoQueEuQueira("imagemprincipal", $_GET['id']) ?>"
                         class="img-bordered col-lg-3">
                    <div class="caption col-lg-9">
                        <h1><?php echo $produtoController->retornaAlgoDoProdutoQueEuQueira("nome", $_GET['id']) ?></h1>
                        <hr>

                        <form action="../controller/PerguntaController.php?q=cadastrar" method="post">
                            <input type="text" hidden="hidden" name="perguntaProduto"
                                   value="<?php echo $_GET['id']; ?>"/>
                            <input type="text" hidden="hidden" name="perguntaIdUsuario"
                                   value="<?php echo $_SESSION['idUsuario']; ?>"/>
                            <label for="pergunta">Pergunta</label>
                            <textarea class="form-control" id="pergunta" name="perguntaDescricao" rows="9"></textarea>
                            <div class="col-lg-12 text-right" style="padding-top: 10px;">
                                <a onclick="limparcampos();" class="btn btn-danger btn-flat">Limpar campos</a>
                                <input type="submit" class="btn btn-primary btn-flat" name="enviar" id="enviar"
                                       value="Cadastrar">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>

    </body>
    </html>
<?php } else {
    echo "Erro, produto não informado.";
} ?>