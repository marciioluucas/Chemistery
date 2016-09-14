<?php
/**
 * Created by PhpStorm.
 * User: Marcio Lucas
 * Date: 10/03/2016
 * Time: 15:07
 */

require_once "protecaoPaginas.php";
require_once "../controller/CategoriaController.php";
require_once "../controller/SecaoController.php";

$secaoController = new SecaoController();
$categoriaController = new CategoriaController();
if ($_SESSION["tempo"] < time()) {
    echo "<script>window.location.replace('lockscreen.php')</script>";
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

    <link rel="stylesheet" href="../plugins/select2/select2.css">

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


    </style>
</head>
<body>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <h1>
            Cadastro
            <small>de produtos</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="">Produtos</li>
            <li class="active">Cadastro</li>
        </ol>
    </div>
<!--    <div id="rootwizard">-->
<!--        <div class="navbar">-->
<!--            <div class="navbar-inner">-->
<!--                <div class="container">-->
<!--                    <ul class="nav nav-pills">-->
<!--                        <li><a href="#tab1" data-toggle="tab" role="presentation">Primeiro passo</a></li>-->
<!--                        <li><a href="#tab2" data-toggle="tab" role="presentation">Segundo passo</a></li>-->
<!--                        <li><a href="#tab3" data-toggle="tab" role="presentation">Terceiro passo</a></li>-->
<!---->
<!--                    </ul>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--        <div class="tab-content">-->
<!--            <div class="tab-pane" id="tab1">-->
<!--                1-->
<!--            </div>-->
<!--            <div class="tab-pane" id="tab2">-->
<!--                2-->
<!--            </div>-->
<!--            <div class="tab-pane" id="tab3">-->

<!--                <h3>Cadastrando produto</h3>-->
                <form action="../controller/ProdutoController.php?b=cadastrar" method="post" enctype="multipart/form-data"
                      id="frmCadastroProdutos">
                    <input type="text" name="b" id="b" value="cadastrar" hidden="hidden">
                    <input type="text" name="idUsuarioLogado" id="idUsuarioLogado" value="<?php echo $idUser ?>"
                           hidden="hidden">
                    <div class="box-body">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="produtoNome">Nome</label>
                                <input type="text" class="form-control" id="produtoNome" name="produtoNome" required
                                       placeholder="Coloque aqui o nome">
                            </div>
                            <div class="form-group">
                                <label for="produtoMarca">Marca</label>
                                <input type="text" class="form-control" id="produtoMarca" name="produtoMarca"
                                       placeholder="Coloque aqui a marca">
                            </div>

                            <div class="form-group">
                                <label for="produtoModelo">Modelo</label>
                                <input type="text" class="form-control" id="produtoModelo" name="produtoModelo"
                                       placeholder="Coloque aqui o modelo">
                            </div>

                            <div class="form-group">
                                <label for="produtoDescricao">Descrição</label>
                            <textarea class="form-control" id="produtoDescricao" name="produtoDescricao" required
                                      placeholder="Coloque aqui a descrição"
                                      style="resize: none; height: 280px;;"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="produtoPrecoOnOff">Mostrar Preço?</label>
                                <div class="onoffswitch">
                                    <input type="checkbox" name="produtoMostrarPreco" class="onoffswitch-checkbox"
                                           id="produtoPrecoOnOff" onclick="habilitarCheckBox()">
                                    <label class="onoffswitch-label" for="produtoPrecoOnOff"></label>
                                </div>
                            </div>
                            <div class="form-group" id="produtoPrecoDiv" style="display: none;">
                                <label for="produtoPreco">Preço</label>
                                <input type="text" class="form-control" id="produtoPreco" name="produtoPreco">
                            </div>

                            <div class="form-group">
                                <label for="produtoSecao">Seção</label>
                                <div class="input-group" style="margin-top: -3px !important;">
                            <span class="input-group-addon" id="Lupa" style="height: 34px !important;"><i
                                    class="fa fa-search"
                                    aria-hidden="true"></i></span>
                                    <select class="form-control select2"
                                            style="width: 100%; border-radius: 0 !important; display: none"
                                            id="produtoSecao" aria-describedby="Lupa" name="produtoSecao">

                                        <option selected="selected">Nenhuma</option>
                                        <?php $secaoController->consultaSecaos() ?>
                                    </select>
                                </div>
                            </div><!-- /.form-group -->
                        </div>
                        <div class="col-lg-6" style="margin-top: 3px;">

                            <div class="form-group">
                                <label for="produtoCategoria1">Categoria</label>
                                <div class="input-group" style="margin-top: -3px !important;">
                            <span class="input-group-addon" id="Lupa" style="height: 34px !important;"><i
                                    class="fa fa-search" aria-hidden="true"></i></span>
                                    <select class="form-control select2"
                                            style="width: 100%; border-radius: 0 !important; display: none"
                                            id="produtoCategoria1" aria-describedby="Lupa" name="produtoCategoria">

                                        <option selected="selected">Nenhuma</option>
                                        <?php $categoriaController->consultaCategorias() ?>
                                    </select>
                                </div>
                            </div><!-- /.form-group -->
                            <div class="form-group">
                                <label for="produtoCor">Cor</label>
                                <input type="text" class="form-control" id="produtoCor" name="produtoCor"
                                       placeholder="Coloque aqui a cor">
                            </div>
                            <div class="form-group">
                                <label for="produtoAno">Ano</label>
                                <input type="text" class="form-control" id="produtoAno" name="produtoAno"
                                       placeholder="Coloque aqui o ano">
                            </div>

                            <div class="form-group">
                                <label for="produtoImagem">Imagem Princpal</label>

                                <input type="file" class="form-control" id="produtoImagemPrincipal"
                                       name="produtoImagemPrincipal" accept="image/png, image/jpg, image/jpeg">
                                <p class="help-block">Para melhor vizualização recomendamos imagens 256 x 256 ou maior e do
                                    formato .jpg
                                    ou .png</p>
                                <div class="col-lg-12"><img src="../imagens/noimg.png" id="preview-da-imagemPrincipal"
                                                            width="190"
                                                            height="190" class="thumbnail img-responsive"></div>
                            </div>
                            <div class="form-group">
                                <label for="produtoImagem">Imagem Secundárias</label>

                                <input type="file" class="form-control" id="produtoimagem" name="produtoImagem[]" multiple
                                       accept="image/png, image/jpg, image/jpeg">
                                <p class="help-block">Para melhor vizualização recomendamos imagens 256 x 256 ou maior e do
                                    formato .jpg
                                    ou .png</p>
                                <div class="col-sm-3"><img src="../imagens/noimg.png" id="preview-da-imagem2" width="190"
                                                           height="190" class="thumbnail img-responsive"></div>
                                <div class="col-sm-3"><img src="../imagens/noimg.png" id="preview-da-imagem1" width="190"
                                                           height="190" class="thumbnail img-responsive"></div>
                                <div class="col-sm-3"><img src="../imagens/noimg.png" id="preview-da-imagem" width="190"
                                                           height="190" class="thumbnail img-responsive"></div>


                            </div>
                            <div class="col-lg-12 text-right">
                                <a onclick="limparcampos();" class="btn btn-danger">Limpar campos</a>
                                <input type="submit" class="btn btn-primary" name="enviar" id="enviar" value="Cadastrar">
                            </div>
                        </div>

                        <!-- /.box-body -->


                    </div>
                </form>


            </div>

<!---->
<!--        </div>-->
<!--    </div>-->
<!--   -->
<!---->
<!--</div>-->
<!-- jQuery 2.1.4 -->
<script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script src="https://code.jquery.com/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="../bootstrap/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="../plugins/fastclick/fastclick.min.js"></script>

<script src="../plugins/select2/select2.full.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>

<script src="js/jquery.wallform.min.js"></script>

<script src="js/jquery.onofff.min.js"></script>

<script src="js/require.min.js"></script>

<script src="../plugins/jquery-steps/jquery.steps.js"></script>

<script src="../plugins/jquery-steps/jquery.steps.min.js"></script>

<script>
    function readURL(input) {
        if (input.files && input.files[0] && input.files[1] && input.files[2]) {
            var reader1 = new FileReader();
            reader1.onload = function (e) {
                $('#preview-da-imagem').attr('src', e.target.result);
            };
            var reader2 = new FileReader();
            reader2.onload = function (c) {
                $('#preview-da-imagem1').attr('src', c.target.result);
            };
            var reader3 = new FileReader();
            reader3.onload = function (d) {
                $('#preview-da-imagem2').attr('src', d.target.result);
            };
            reader1.readAsDataURL(input.files[2]);
            reader2.readAsDataURL(input.files[1]);
            reader3.readAsDataURL(input.files[0]);
        }
    }

    $("#produtoimagem").change(function () {
        readURL(this);
    });

    function readURL2(input) {
        if (input.files && input.files[0]) {
            var reader1 = new FileReader();
            reader1.onload = function (e) {
                $('#preview-da-imagemPrincipal').attr('src', e.target.result);
            };
            reader1.readAsDataURL(input.files[0]);

        }
    }

    $("#produtoImagemPrincipal").change(function () {
        readURL2(this);
    });


    function habilitarCheckBox() {
        if (document.getElementById("produtoPrecoDiv").style.display == "none") {
            $("#produtoPrecoDiv").fadeIn();
//                    document.getElementById("produtoPrecoDiv").style.display = "block";
        } else {
            $("#produtoPrecoDiv").fadeOut();
//                    document.getElementById("produtoPrecoDiv").style.display = "none";
        }
    }

    function limparcampos() {
        $('#frmCadastroProdutos').each(function () {
            this.reset();
        });
    }

    $(function () {
        //Initialize Select2 Elements
        $(".select2").select2();
    });
    $(document).ready(function() {
        $('#rootwizard').bootstrapWizard();
    });

</script>

</body>
</html>
