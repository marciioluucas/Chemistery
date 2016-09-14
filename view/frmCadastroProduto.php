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
require_once "../controller/ProdutoController.php";

$secaoController = new SecaoController();
$categoriaController = new CategoriaController();
$produtoController = new ProdutoController();

if ($secaoController->retornaNumDeSecoes() == 0 and $categoriaController->retornaNumeroDeCategoriasCadastradas() == 0) {
    echo "<script> window.location.href = '../erros/semCategoriasESecoesCadastradas.php'</script>";
}
if ($categoriaController->retornaNumeroDeCategoriasCadastradas() == 0) {
    echo "<script> window.location.href = '../erros/semCategoriasCadastradas.php'</script>";
}
if ($secaoController->retornaNumDeSecoes() == 0) {
    echo "<script> window.location.href = '../erros/semSecoesCadastradas.php'</script>";
}


if ($_SESSION["tempo"] < time()) {
    echo "<script>window.location.replace('lockscreen.php')</script>";
}else{
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
    <!-- Icone-->
    <link rel="shortcut icon" href="../favicon.ico"/>

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

        .select2-selection{
            border-color: #d2d6de !important;
        }

        .select2-selection--single{
            border-color: #d2d6de !important;
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
                    <label for="produtoDescricao">Descrição</label>
                            <textarea class="form-control" id="produtoDescricao" name="produtoDescricao" required
                                      placeholder="Coloque aqui a descrição"
                                      style="resize: none; height: 280px;;"></textarea>
                </div>

                <div class="form-group">
                    <label for="produtoPrecoOnOff">Mostrar Preço?</label>
                    <div class="onoffswitch">
                        <input type="checkbox" name="produtoPrecoOnOff" class="onoffswitch-checkbox"
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

                            <option selected="selected" value="0">Nenhuma</option>
                            <?php $secaoController->consultaSecaos() ?>
                        </select>
                    </div>
                </div><!-- /.form-group -->

                <div class="form-group">
                    <label for="produtoCategoria2">Categoria</label>
                    <div class="input-group" style="margin-top: -3px !important;">
                            <span class="input-group-addon" id="Lupa" style="height: 34px !important;"><i
                                    class="fa fa-search" aria-hidden="true"></i></span>
                        <select class="form-control select2"
                                style="width: 100%; border-radius: 0 !important; display: none"
                                id="produtoCategoria2" aria-describedby="Lupa" name="produtoCategoria2">

                            <option selected="selected" value="0">Nenhuma</option>
                            <?php $categoriaController->consultaCategorias() ?>
                        </select>
                    </div>
                </div><!-- /.form-group -->
            </div>
            <div class="col-lg-6" style="margin-top: 3px;">


                <div class="form-group">
                    <label for="produtoImagem">Imagem Principal</label>
                    <input type="file" class="form-control" id="produtoImagemPrincipal"
                           name="produtoImagemPrincipal" accept="image/png, image/jpg, image/jpeg">
                    <p class="help-block">Para melhor vizualização recomendamos imagens 256 x 256 ou maior e do
                        formato .jpg
                        ou .png</p>
                    <div class="divcontainer" style="width: 190px !important; height: 190px !important;">
                        <img src="../imagens/noimg.png" id="preview-da-imagemPrincipal"
                             style="width: auto !important; height: auto !important; max-height: 190px !important;"
                             class="img"></div>
                </div>
                <div class="form-group">
                    <label for="produtoImagem">Imagem Secundárias</label>
                    <input type="file" class="form-control" id="produtoimagem" name="produtoImagem[]" multiple
                           accept="image/png, image/jpg, image/jpeg">
                    <p class="help-block">Para melhor vizualização recomendamos imagens 256 x 256 ou maior e do
                        formato .jpg
                        ou .png</p>

                    <div class="col-sm-2 divcontainer"><img src="../imagens/noimg.png" id="preview-da-imagem8"
                                                            class="img"></div>
                    <div class="col-sm-2 divcontainer"><img src="../imagens/noimg.png" id="preview-da-imagem7"
                                                            class="img"></div>
                    <div class="col-sm-2 divcontainer"><img src="../imagens/noimg.png" id="preview-da-imagem6"
                                                            class="img"></div>
                    <div class="col-sm-2 divcontainer"><img src="../imagens/noimg.png" id="preview-da-imagem5"
                                                            class="img"></div>
                    <div class="col-sm-2 divcontainer"><img src="../imagens/noimg.png" id="preview-da-imagem4"
                                                            class="img"></div>
                    <div class="col-sm-2 divcontainer"><img src="../imagens/noimg.png" id="preview-da-imagem3"
                                                            class="img"></div>
                    <div class="col-sm-2 divcontainer"><img src="../imagens/noimg.png" id="preview-da-imagem2"
                                                            class="img"></div>
                    <div class="col-sm-2 divcontainer"><img src="../imagens/noimg.png" id="preview-da-imagem1"
                                                            class="img"></div>
                    <div class="col-sm-2 divcontainer"><img src="../imagens/noimg.png" id="preview-da-imagem"
                                                            class="img"></div>


                </div>
                <div id="parametrosAdicionais">

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

<script src="../plugins/input-mask/maskmoney.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-jcrop/0.9.12/js/jquery.Jcrop.min.js"></script>
<script src="../plugins/input-mask/jquery.inputmask.js"></script>
<script src="../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="../plugins/input-mask/jquery.inputmask.extensions.js"></script>
<script src="../plugins/input-mask/maskmoney.js"></script>

<script>
    $(window).resize(function(){
        $("body").setHeight($(window).height());
    });
    
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

    $("#produtoCategoria2").change(function () {
        var parametroHttp = this.value;
        $('#parametrosAdicionais').load("../controller/ProdutoController.php?produtoCategoria2=" + parametroHttp);
    });

</script>
<script language="Javascript">
    $(function () {
        $('#ImagemCrop').Jcrop({
            aspectRatio: 1,
            onSelect: UpdateCrop,
            setSelect: [0, 0, 200, 200]
        });

    });
    function UpdateCrop(c) {
        $('#x').val(c.x);
        $('#y').val(c.y);
        $('#w').val(c.w);
        $('#h').val(c.h);
        $("#altura").html("Altura:" + c.h);
        $("#largura").html("Largura:" + c.w);
    }

    $(".atributo-data").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});

    $(".atributo-numero").inputmask("(99) 9999-9999", {"placeholder": "(xx) xxxx-xxxx"});

    $(".atributo-dinheiro").maskMoney({
        prefix: 'R$ ',
        allowNegative: true,
        thousands: '.',
        decimal: ',',
        affixesStay: false
    })
</script>

</body>
</html>
