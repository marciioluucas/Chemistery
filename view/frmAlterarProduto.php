<?php
/**
 * Created by PhpStorm.
 * User: Marcio Lucas
 * Date: 10/03/2016
 * Time: 15:07
 */
include_once("../controller/ProdutoController.php");
require_once "../controller/CategoriaController.php";
require_once "protecaoPaginas.php";

$categoriaController = new CategoriaController();
$produtoController = new ProdutoController();



if ($_SESSION["tempo"] < time()) {
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
            margin-left: 20px;
            background-color: #fff;
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

        .select2-selection {
            border-color: #d2d6de !important;
        }

        .select2-selection--single {
            border-color: #d2d6de !important;
        }

        .controlesImagem {
            margin-left: 50%;
            margin-bottom: 10px;
        }
        .check
        {
            opacity:0.5;
            color:violet;

        }

        input[type=file] {
            display: none;
        }

        .divcontainer img:hover {
            cursor: pointer;
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
                    <div class="form-group">
                        <div class="col-md-3"><label class="btn bg-purple"><img src="../sources/imgs/comburente.png" alt="..." class="img-thumbnail img-check"><input type="checkbox" name="chk1" id="item4" value="val1" class="hidden" autocomplete="off"></label></div>
                        <div class="col-md-3"><label class="btn bg-purple"><img src="../sources/imgs/corrosivo.jpg" alt="..." class="img-thumbnail img-check"><input type="checkbox" name="chk2" id="item4" value="val2" class="hidden" autocomplete="off"></label></div>
                        <div class="col-md-3"><label class="btn bg-purple"><img src="../sources/imgs/explosivo.png" alt="..." class="img-thumbnail img-check"><input type="checkbox" name="chk3" id="item4" value="val3" class="hidden" autocomplete="off"></label></div>
                        <div class="col-md-3"><label class="btn bg-purple"><img src="../sources/imgs/inflamavel.png" alt="..." class="img-thumbnail img-check"><input type="checkbox" name="chk4" id="item4" value="val4" class="hidden" autocomplete="off"></label></div>
                        <div class="col-md-3"><label class="btn bg-purple"><img src="../sources/imgs/nocivo-irritante.png" alt="..." class="img-thumbnail img-check"><input type="checkbox" name="chk5" id="item4" value="val5" class="hidden" autocomplete="off"></label></div>
                        <div class="col-md-3"><label class="btn bg-purple"><img src="../sources/imgs/toxico.png" alt="..." class="img-thumbnail img-check"><input type="checkbox" name="chk6" id="item4" value="val6" class="hidden" autocomplete="off"></label></div>
                    </div>
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
                        <div class="col-md-3 text-center" style="margin-left: 14px;"><i class="fa fa-repeat" aria-hidden="true" id="rodarPrincipal"></i> - <i
                                class="fa fa-times" aria-hidden="true" id="excluirPrincipal"></i><br>
                        </div>
                    </div>
                    <br><br>


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

    $("#produtoImagemPrincipal").change(function () {
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#preview-da-imagemPrincipal').attr('src', e.target.result);
            };
            reader.readAsDataURL(this.files[0]);

        }
    });

    $(document).ready(function(e){
        $(".img-check").click(function(){
            $(this).toggleClass("check");
        });
    });


    function limparcampos() {
        $('#frmAlterarProduto').each(function () {
            this.reset();
        });
    }

    $(function () {
        //Initialize Select2 Elements
        $(".select2").select2();
        var i = 1;

        $("#rodarPrincipal").click(function () {
            var ang = 90;
            $("#preview-da-imagemPrincipal").rotate(ang * i);
            $("#angImgPrincipal").val($('#preview-da-imagemPrincipal').getRotateAngle());
            i++;
        });



    });

    $("#excluirPrincipal").click(function () {
        var conf = confirm("Você tem certeza que quer excluir essa imagem?");
        if (conf) {
            $.ajax({
                type: 'get',
                data: 'ac=excluirImg&produtoId=<?php echo $id = (isset($_GET['id'])) ? $_GET['id'] : 'nenhum';?>',
                url: '../controller/ProdutoController.php',
                success: function () {
                    console.log('Sucesso 1!')
                }


            });
            $("#preview-da-imagem").attr('src', "../imagens/noimg.png");
        }});



    $("#preview-da-imagemPrincipal").click(function () {
        $("#produtoImagemPrincipal").click();
    });



    $(document).ready(function () {
        var url = purl(document.url);
        var parametroHttp = url.param('categoria_id');
        var id_produto = url.param('id');
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
    })


</script>

</body>
</html>