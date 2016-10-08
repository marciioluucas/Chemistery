<?php
require_once "../controller/ProdutoController.php";
require_once "../controller/ConfSistemaController.php";
$confSistemaController = new ConfSistemaController();
$produtoController = new ProdutoController();
$toString = "";
$qntImagens = $produtoController->retornaNumeroDeImagensNoProduto($_GET['id']);
$stringArray = $produtoController->retornaAlgoDoProdutoQueEuQueira("imagem", $_GET['id']);;

$arrayImagens = explode('-', $stringArray);

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

    <link rel="stylesheet" href="../test/paginator/css/jqpagination.css">
    <script type="text/javascript" src="../test/paginator/js/jquery.jqpagination.min.js"></script>

    <!--    Icone-->
    <link rel="shortcut icon" href="../favicon.ico"/>
    <script>
        $(document).ready(function () {
            $("#imagemPrincipal").zoom();
        });
    </script>
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

        .thumbnails {
            width: 450px;
            height: 70px;
            list-style: none;
            /*margin-bottom: 1.5em;*/
        }

        .main-image {
            margin-bottom: 0.75em;
        }

        .thumbnails li {
            display: inline;
            margin: 0 10px 0 0;
        }

        .thumbnails img {
            max-width: 70px;
            max-height: 70px;

        }

        .pag2 {

            width: 490px;
            height: 70px;
            list-style: none;
            display: none;
            border: 1px solid #CDCDCD;
            margin-right: 1px;

        }

        .pag1 {
            width: 490px;
            height: 70px;
            list-style: none;
            border: 1px solid #CDCDCD;
            margin-right: 1px;

        }

        .previous {
            display: none;
            height: 38px;
            width: 19px;
            background-image: url('../sources/imgs/btn_seta_direita_cinza_left.png');
            border: none;
            background-color: transparent;
        }

        .next {
            height: 38px;
            width: 19px;
            background-image: url('../sources/imgs/btn_seta_direita_cinza_right.png');
            border: none;
            background-color: transparent;
        }

        .imgs {
            width: 70px;
            height: 70px;
            text-align: center;
        }

        td {
            padding: 2px;
        }
        

        /* styles unrelated to zoom */

        /* these styles are for the demo, but are not required for the plugin */
        .zoom {
            display: inline-block;
            position: relative;
        }

        /* magnifying glass icon */
        .zoom:after {
            content: '';
            display: block;
            width: 33px;
            height: 33px;
            position: absolute;
            top: 0;
            right: 0;
        }

        .zoom img {
            display: block;
        }

        .zoom img::selection {
            background-color: transparent;
        }
    </style>
    <script src='http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script>
    <script src='../plugins/jquery-zoom/jquery.zoom.js'></script>
    <script>
        $(document).ready(function () {
            $('#imgPrincipal').zoom();
        });
    </script>
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

            <div class="thumbnails">

                <table style="height: 70px;">
                    <tr>
                        <td style="width: 20px" class="previous1">
                            <button class="previous" data-action="previous"></button>

                        </td>
                        <?php
                        echo "<td class='pag1 imgs'>
                            <div class='div-imagens-secundarias'><a href = '../imagens/" . strtolower($produtoController->retornaAlgoDoProdutoQueEuQueira("imagemprincipal", $_GET['id'])) . "' ><img
                                        src = '../imagens/" . strtolower($produtoController->retornaAlgoDoProdutoQueEuQueira("imagemprincipal", $_GET['id'])) . "'
                                        alt = 'Thumbnails' ></a ></div >
                        </td >";
                        if (count($arrayImagens) > 1) {
                            for ($i = 0;
                                 $i < count($arrayImagens);
                                 $i++) {

                                if (count($arrayImagens) > 4) {
                                    if ($i < 4) {
                                        echo "<td class='pag1 imgs'>
                            <div><a href = '../imagens/" . $arrayImagens[$i] . "' ><img
                                        src = '../imagens/" . $arrayImagens[$i] . "'
                                        alt = 'Thumbnails' ></a ></div >
                        </td > ";
                                    } else {
                                        echo "<td class='pag2 imgs' >
                            <div><a href = '../imagens/" . $arrayImagens[$i] . "' ><img
                                        src = '../imagens/" . $arrayImagens[$i] . "'
                                        alt = 'Thumbnails' ></a ></div >
                        </td > ";

                                    }
                                } else {
                                    echo "<td class='pag1 imgs' >
                            <div><a href = '../imagens/" . $arrayImagens[$i] . "' ><img
                                        src = '../imagens/" . $arrayImagens[$i] . "'
                                        alt = 'Thumbnails' ></a ></div >
                        </td > ";
                                }
                            }
                            ?>
                            <?php
                            if (count($arrayImagens) > 5) {
                                echo " <td style='width: 20px'>
                            <button class='next' data-action='next'></button>
                        </td>";
                            }
                        }
                        ?>
                    </tr>
                </table>

            </div>

        </div>
        <div class="col-sm-6"><h2 style="color: <?php echo $confSistemaController->retornaCor(); ?>">
                <b><?php echo $produtoController->retornaAlgoDoProdutoQueEuQueira("nome", $_GET['id']) ?></b></h2>
            <hr>
        </div>
        <div class="col-sm-6" style="padding-left: 50px">


            <?php if ($produtoController->retornaAlgoDoProdutoQueEuQueira("mostrapreco", $_GET['id']) and $produtoController->retornaAlgoDoProdutoQueEuQueira("preco", $_GET['id']) != 0) {
                echo "
                   <h3>Preço</h3>
                   <h2 class='text-red'>R$ " . $produtoController->retornaAlgoDoProdutoQueEuQueira("preco", $_GET['id']) . "</h2>
               ";
            }
            if ($produtoController->retornaAlgoDoProdutoQueEuQueira("mostrapreco", $_GET['id']) == 0) {
                echo "
                   <h3>Preço</h3>
                   <h2 class='text-red'>Preço somente nas lojas físicas!</h2>";
            }
            ?>
            <h3>Informações Técnicas</h3>


            <table style="width: 100%; border-color: #FFFFFF; border: none" border="1">
                <?php

                $produtoController->retornaAtributoDosProdutos($_GET['id'], $produtoController->retornaAlgoDoProdutoQueEuQueira("categoria_id", $_GET['id']));
                ?>
            </table>
        </div>


        <div class="col-sm-12" style="">
            <hr>
            <h2>Descrição</h2>
            <p><?php echo $produtoController->retornaAlgoDoProdutoQueEuQueira("descricao", $_GET['id']) ?></p>
            <br><br>
            <hr>
            <br><br>

        </div>
    </div>
</div>
<!-- jQuery 2.1.4 -->
<script src='../plugins/jQuery/jQuery-2.1.4.min.js'></script>
<!-- Bootstrap 3.3.5 -->
<script src='../bootstrap/js/bootstrap.min.js'></script>
<!-- DataTables -->
<script src='../plugins/datatables/jquery.dataTables.min.js'></script>
<script src='../plugins/datatables/dataTables.bootstrap.min.js'></script>
<!-- SlimScroll -->
<script src='../plugins/slimScroll/jquery.slimscroll.min.js'></script>
<!-- FastClick -->
<script src='../plugins/fastclick/fastclick.min.js'></script>
<!-- AdminLTE App -->
<script src='../dist/js/app.min.js'></script>
<!-- AdminLTE for demo purposes -->
<script src='../dist/js/demo.js'></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="../test/simplegal.js"></script>
<script src='../plugins/jquery-zoom/jquery.zoom.js'></script>
<script>
    $(window).resize(function(){
        $("body").setHeight($(window).height());
    });

    
    $(document).ready(function () {
        $('.thumbnails').simpleGal({
            mainImage: '.custom'
        });

    });

    $(document).ready(function () {

        $('.previous').click(function () {
            $('.pag1').show();
            $('.pag2').hide();
            $('.previous').hide();
//            $('.previous1').hide();
            $('.next').show();
//            $('.thumbnails').css('height', '70px');
        });


        $('.next').click(function () {
            $('.pag1').hide();
            $('.pag2').show();
            $('.next').hide();
            $('.previous').show();
//            $('.previous1').show();
//            $('.thumbnails').css('height', '70px');
        })

    });


</script>
<!-- page script -->
</body>
</html>