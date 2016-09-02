<?php
/**
 * Created by PhpStorm.
 * User: Marcio Lucas
 * Date: 10/03/2016
 * Time: 15:07
 */
include_once("../controller/ProdutoController.php");
require_once "../controller/CategoriaController.php";
require_once "../controller/SecaoController.php";
require_once "protecaoPaginas.php";

$categoriaController = new CategoriaController();
$secaoController = new SecaoController();
$produtoController = new ProdutoController();

$stringImagens = strtolower($produtoController->retornaAlgoDoProdutoQueEuQueira("imagem", $_GET['id']));
$arrayImagens = explode('-', $stringImagens);
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
    <!-- Icone-->
    <link rel="shortcut icon" href="../favicon.ico"/>

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

        .divcontainer {
            height: 100px;
            width: 100px;
            display: flex;
            display: -webkit-flex; /* Garante compatibilidade com navegador Safari. */
            text-align: center;
            justify-content: center;
            align-items: center;
            border: 1px solid #CDCDCD;
            padding: 10px;
            margin-left: 20px;
            background-color: #fff;
            margin-bottom: 20px;
        }

        .img {
            margin-top: 10px;
            margin-bottom: 10px;
            max-width: 100%;
            /*padding: 10px;*/
            /*border: 1px solid #ccc;*/
            background: #fff;
            /*box-shadow: 1px 1px 7px rgba(0, 0, 0, 0.1);*/
            height: auto;
            width: auto;
            max-height: 100px;

            /*width: 374px;*/
            /*height: 367px;*/

        }
    </style>
</head>
<body>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Alteração
            <small>de produtos</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="">Produtos</li>
            <li class="active">Alteração</li>
        </ol>
    </section>
    <div>

        <form action="../controller/ProdutoController.php" method="post" enctype="multipart/form-data"
              id="frmAlterarProduto">
            <input type="text" name="id1" id="id1" hidden="hidden"
                   value="<?php echo $id = (isset($_GET['id'])) ? $_GET['id'] : 'nenhum'; ?>"/>
            <input type="text" name="acao" id="acao" value="alterar" hidden="hidden"/>

            <div class="box-body">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="produtoNome">Nome</label>
                        <input type="text" class="form-control" id="produtoNome" name="produtoNome1" required
                               value="<?php echo $_GET['nome'] ?>"
                               placeholder="Coloque aqui o nome">
                    </div>
                    <div class="form-group">
                        <label for="produtoDescricao">Descrição</label>
                            <textarea class="form-control" id="produtoDescricao" name="produtoDescricao1" required
                                      placeholder="Coloque aqui a descrição"
                                      style="resize: none; height: 280px;"><?php echo $_GET['descricao'] ?></textarea>
                    </div>


                    <div class="form-group">
                        <label for="produtoPrecoOnOff">Mostrar Preço?</label>
                        <div class="onoffswitch">
                            <input type="checkbox" name="produtoPrecoOnOff1"
                                   class="onoffswitch-checkbox" <?php echo $checked = ($_GET['mostrapreco'] == 1) ? "checked='true'" : ""; ?>
                                   id="produtoPrecoOnOff1" onclick="habilitarCheckBox()">
                            <label class="onoffswitch-label" for="produtoPrecoOnOff1"></label>
                        </div>
                    </div>
                    <div class="form-group" id="produtoPrecoDiv"
                         style="display: <?php echo $display = ($_GET['mostrapreco'] == 1) ? "block'" : "none"; ?>">
                        <label for="produtoPreco">Preço</label>
                        <input type="text" class="form-control" id="produtoPreco" name="produtoPreco1"
                               value="<?php echo $_GET['preco'] ?>">
                    </div>


                    <div class="form-group">

                        <label for="produtoSecao">Seção</label>
                        <div class="input-group" style="margin-top: -3px !important;">
                            <span class="input-group-addon" id="Lupa" style="height: 34px !important;"><i
                                    class="fa fa-search"
                                    aria-hidden="true"></i></span>
                            <select class="form-control select2"
                                    style="width: 100%; border-radius: 0 !important; display: none"
                                    id="produtoSecao" aria-describedby="Lupa" name="produtoSecao1">
                                <?php echo $secaoController->puxarSecaoJaCadastrada($_GET['secao_id']) ?>
                                <?php $secaoController->consultaSecaos() ?>
                            </select>
                        </div>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                        <label for="categoriaProduto">Categoria</label>
                        <div class="input-group" style="margin-top: -3px !important;">
                            <span class="input-group-addon" id="Lupa" style="height: 34px !important;"><i
                                    class="fa fa-search"
                                    aria-hidden="true"></i></span>
                            <select class="form-control select2"
                                    style="width: 100%; border-radius: 0 !important; display: none"
                                    id="categoriaProduto" name="produtoCategoria1" aria-describedby="Lupa">
                                <option selected="selected" value="0">Nenhuma</option>
                                <?php echo $categoriaController->puxarCategoriaJaCadastrada($_GET['categoria_id']) ?>
                                <?php $categoriaController->consultaCategorias() ?>
                            </select>
                        </div>
                    </div><!-- /.form-group -->
                </div>
                <div class="col-lg-6" style="margin-top: 3px;">
                    <div class="form-group">
                        <label for="produtoImagem">Imagem Principal</label>
                        <input type="file" class="form-control" id="produtoImagemPrincipal"
                               name="produtoImagemPrincipal1" accept="image/png, image/jpg, image/jpeg">
                        <p class="help-block">Caso for preciso, clique na imagem para girá-la</p>
                        <div class="divcontainer control" style="width: 190px !important; height: 190px !important;">
                            <img
                                src="<?php echo $produtoController->retornaAlgoDoProdutoQueEuQueira('imagemprincipal', $_GET['id']) ?>"
                                id="preview-da-imagemPrincipal"
                                style="width: auto !important; height: auto !important; max-height: 190px !important;"
                                class="img">
                            <input hidden="hidden" name="angImgPrincipal" value="0" id="angImgPrincipal">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="produtoImagem">Imagem Secundárias</label>
                        <input type="file" class="form-control" id="produtoimagem" name="produtoImagem1[]" multiple
                               accept="image/png, image/jpg, image/jpeg">
                        <p class="help-block">Para melhor vizualização recomendamos imagens 256 x 256 ou maior e do
                            formato .jpg
                            ou .png</p>
                        <div class="col-sm-2 divcontainer"><img
                                src="<?php echo isset($arrayImagens[0]) ? "../imagens/" . $arrayImagens[0] : "../imagens/noimg.png" ?>"
                                id="preview-da-imagem"
                                class="img">
                            <input hidden="hidden" name="angImg[]" value="0" id="angImg0">
                        </div>
                        <div class="col-sm-2 divcontainer"><img
                                src="<?php echo isset($arrayImagens[1]) ? "../imagens/" . $arrayImagens[1] : "../imagens/noimg.png" ?>"
                                id="preview-da-imagem1"
                                class="img">
                            <input hidden="hidden" name="angImg[]" value="0" id="angImg1">
                        </div>
                        <div class="col-sm-2 divcontainer"><img
                                src="<?php echo isset($arrayImagens[2]) ? "../imagens/" . $arrayImagens[2] : "../imagens/noimg.png" ?>"
                                id="preview-da-imagem2"
                                class="img">
                            <input hidden="hidden" name="angImg[]" value="0" id="angImg2">
                        </div>

                        <div class="col-sm-2 divcontainer"><img
                                src="<?php echo isset($arrayImagens[3]) ? "../imagens/" . $arrayImagens[3] : "../imagens/noimg.png" ?>"
                                id="preview-da-imagem3"
                                class="img">
                            <input hidden="hidden" name="angImg[]" value="0" id="angImg3">
                        </div>

                        <div class="col-sm-2 divcontainer"><img
                                src="<?php echo isset($arrayImagens[4]) ? "../imagens/" . $arrayImagens[4] : "../imagens/noimg.png" ?>"
                                id="preview-da-imagem4"
                                class="img">
                            <input hidden="hidden" name="angImg[]" value="0" id="angImg4">
                        </div>

                        <div class="col-sm-2 divcontainer"><img
                                src="<?php echo isset($arrayImagens[5]) ? "../imagens/" . $arrayImagens[5] : "../imagens/noimg.png" ?>"
                                id="preview-da-imagem5"
                                class="img">
                            <input hidden="hidden" name="angImg[]" value="0" id="angImg5">
                        </div>

                        <div class="col-sm-2 divcontainer"><img
                                src="<?php echo isset($arrayImagens[6]) ? "../imagens/" . $arrayImagens[6] : "../imagens/noimg.png" ?>"
                                id="preview-da-imagem6"
                                class="img">
                            <input hidden="hidden" name="angImg[]" value="0" id="angImg6">
                        </div>

                        <div class="col-sm-2 divcontainer"><img
                                src="<?php echo isset($arrayImagens[7]) ? "../imagens/" . $arrayImagens[7] : "../imagens/noimg.png" ?>"
                                id="preview-da-imagem7"
                                class="img">
                            <input hidden="hidden" name="angImg[]" value="0" id="angImg7">
                        </div>

                        <div class="col-sm-2 divcontainer"><img
                                src="<?php echo isset($arrayImagens[8]) ? "../imagens/" . $arrayImagens[8] : "../imagens/noimg.png" ?>"
                                id="preview-da-imagem8"
                                class="img">
                            <input hidden="hidden" name="angImg[]" value="0" id="angImg8">
                        </div>



                    </div>

                    <div id="parametrosAdicionais">

                    </div>
                </div>
                <div class="col-lg-12 text-right">
                    <a onclick="limparcampos();" class="btn btn-danger">Limpar campos</a>
                    <input type="submit" class="btn btn-primary" name="enviar" id="enviar" value="Alterar">
                </div>
            </div>
        </form>
    </div>
</div>
<!-- jQuery 2.1.4 -->
<script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script src="https://code.jquery.com/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="../bootstrap/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="../plugins/fastclick/fastclick.min.js"></script>

<script src="../plugins/select2/select2.full.min.js"></script>
<script src="../plugins/purl/purl.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>

<script src="js/jquery.wallform.min.js"></script>

<script src="js/jquery.onofff.min.js"></script>

<script src="js/require.min.js"></script>

<script src="../plugins/input-mask/jquery.inputmask.js"></script>
<script src="../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="../plugins/input-mask/jquery.inputmask.extensions.js"></script>
<script src="../plugins/input-mask/maskmoney.js"></script>
<script src="../plugins/image-rotate/img-rotate.js"></script>

<script>
    function readURL(input) {

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
        var reader4 = new FileReader();
        reader4.onload = function (e) {
            $('#preview-da-imagem3').attr('src', e.target.result);
        };
        var reader5 = new FileReader();
        reader5.onload = function (c) {
            $('#preview-da-imagem4').attr('src', c.target.result);
        };
        var reader6 = new FileReader();
        reader6.onload = function (d) {
            $('#preview-da-imagem5').attr('src', d.target.result);
        };
        var reader7 = new FileReader();
        reader7.onload = function (e) {
            $('#preview-da-imagem6').attr('src', e.target.result);
        };
        var reader8 = new FileReader();
        reader8.onload = function (c) {
            $('#preview-da-imagem7').attr('src', c.target.result);
        };
        var reader9 = new FileReader();
        reader9.onload = function (d) {
            $('#preview-da-imagem8').attr('src', d.target.result);
        };

        reader1.readAsDataURL(input.files[8]);
        reader2.readAsDataURL(input.files[7]);
        reader3.readAsDataURL(input.files[6]);
        reader4.readAsDataURL(input.files[5]);
        reader5.readAsDataURL(input.files[4]);
        reader6.readAsDataURL(input.files[3]);
        reader7.readAsDataURL(input.files[2]);
        reader8.readAsDataURL(input.files[1]);
        reader9.readAsDataURL(input.files[0]);

    }


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

    $("#produtoimagem").change(function () {
        readURL(this);
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
        $('#frmAlterarProduto').each(function () {
            this.reset();
        });
    }

    $(function () {
        //Initialize Select2 Elements
        $(".select2").select2();
        var i = 1;
        var j = 1;
        var k = 1;
        var l = 1;
        var m = 1;
        var n = 1;
        var o = 1;
        var p = 1;
        var q = 1;
        var r = 1;

        $("#preview-da-imagemPrincipal").click(function () {
            var ang = 90;
            $("#preview-da-imagemPrincipal").rotate(ang * i);
            $("#angImgPrincipal").val($('#preview-da-imagemPrincipal').getRotateAngle());
            i++;
        });

        $("#preview-da-imagem").click(function () {
            var ang = 90;
            $("#preview-da-imagem").rotate(ang * j);
            $('#angImg0').val($('#preview-da-imagem').getRotateAngle());
            j++;
        });

        $("#preview-da-imagem1").click(function () {
            var ang = 90;
            $("#preview-da-imagem1").rotate(ang * k);
            $("#angImg1").val($('#preview-da-imagem1').getRotateAngle());
            k++;
        });

        $("#preview-da-imagem2").click(function () {
            var ang = 90;
            $("#preview-da-imagem2").rotate(ang * l);
            $("#angImg2").val($('#preview-da-imagem2').getRotateAngle());
            l++;
        });

        $("#preview-da-imagem3").click(function () {
            var ang = 90;
            $("#preview-da-imagem3").rotate(ang * m);
            $("#angImg3").val($('#preview-da-imagem3').getRotateAngle());
            m++;
        });

        $("#preview-da-imagem4").click(function () {
            var ang = 90;
            $("#preview-da-imagem4").rotate(ang * n);
            $("#angImg4").val($('#preview-da-imagem4').getRotateAngle());
            n++;
        });

        $("#preview-da-imagem5").click(function () {
            var ang = 90;
            $("#preview-da-imagem5").rotate(ang * o);
            $("#angImg5").val($('#preview-da-imagem5').getRotateAngle());
            o++;
        });

        $("#preview-da-imagem6").click(function () {
            var ang = 90;
            $("#preview-da-imagem6").rotate(ang * p);
            $("#angImg6").val($('#preview-da-imagem6').getRotateAngle());
            p++;
        });

        $("#preview-da-imagem7").click(function () {
            var ang = 90;
            $("#preview-da-imagem7").rotate(ang * q);
            $("#angImg7").val($('#preview-da-imagem7').getRotateAngle());
            q++;
        });

        $("#preview-da-imagem8").click(function () {
            var ang = 90;
            $("#preview-da-imagem8").rotate(ang * r);
            $("#angImg8").val($('#preview-da-imagem8').getRotateAngle());
            r++;
        });



    });


    $(document).ready(function () {
        var url = purl(document.url);
        var parametroHttp = url.param('categoria_id');
        var id_produto = url.param('id');
        console.log(parametroHttp);
        $('#parametrosAdicionais').load("../controller/ProdutoController.php?produtoCategoria2=" + parametroHttp + "&id1=" + id_produto);

    });
    $("#categoriaProduto").change(function () {
        var url = purl(document.url);
        var parametroHttp = this.value;
        var id_produto = url.param('id');
        $('#parametrosAdicionais').load("../controller/ProdutoController.php?produtoCategoria2=" + parametroHttp + "&id1=" + id_produto);
    });

    $(".atributo-data").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});

    $(".atributo-numero").inputmask("(99) 9999-9999", {"placeholder": "(xx) xxxx-xxxx"});

    $(".atributo-dinheiro").maskMoney({
        prefix: 'R$ ',
        allowNegative: true,
        thousands: '.',
        decimal: ',',
        affixesStay: false
    });


</script>

</body>
</html>