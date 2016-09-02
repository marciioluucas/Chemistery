<?php
/**
 * Created by PhpStorm.
 * User: Marcio Lucas
 * Date: 10/03/2016
 * Time: 15:07
 */

require_once "protecaoPaginas.php";
require_once "../controller/CategoriaController.php";

$categoriaController = new CategoriaController();
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

    <link rel="stylesheet" href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <link rel="stylesheet" href="../plugins/bootstrap-tag-input/bootstrap-tagsinput.css">
    <!-- Icone-->
    <link rel="shortcut icon" href="../favicon.ico" />
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
        .bootstrap-tagsinput {
            border-radius: 0 !important;
        }
    </style>
</head>
<body>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Alteração
            <small>de categoria</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="">Produtos</li>
            <li class="">Categoria</li>
            <li class="active">Alteração</li>
        </ol>
    </section>
    <div>

        <form action="../controller/CategoriaController.php" method="post" enctype="multipart/form-data"
              id="frmAlterarUsuario">
            <input type="text" name="id1" id="id1" hidden="hidden"
                   value="<?php echo $id = (isset($_GET['id'])) ? $_GET['id'] : 'nenhum'; ?>"/>
            <input type="text" name="acao" id="acao" value="alterar" hidden="hidden"/>

            <div class="box-body">
                <div class="col-lg-5">
                    <div class="form-group">
                        <label for="usuarioNome1">Nome</label>
                        <input type="text" class="form-control" id="categoriaNome1" name="categoriaNome1" required
                               value="<?php echo $_GET['nome'] ?>"
                               placeholder="Coloque aqui o nome">
                    </div>
                    <div class="form-group" ng-app="" ng-init="categoriaAtributos=[
                    <?php echo "" . $categoriaController->consultarAtributosCategoriaPeloIdDaCategoriaParaOAngular($_GET['id']) . ""; ?>]">

                        <label for="categoriaAtributos">Atributos personalizados</label><br>
                        <select type="text" class="form-control" id="categoriaAtributos" ng-model="categoriaAtributos"
                                multiple="multiple"
                                placeholder="+atributos" data-role="tagsinput">
                            <?php echo $categoriaController->consultarAtributosCategoriaPeloIdDaCategoria($_GET['id']) . "'"; ?>
                        </select>
                        <input value="{{categoriaAtributos}}" name="categoriaAtributos" hidden
                               id="categoriaAtributos">
                        <!--                        <input value="{{categoriaAtributos.length}}" name="categoriaAtributos" id="categoriaAtributos2">-->
                        <p class="help-block">Aqui você pode adicionar atributos adicionais a seu produto.</p>


                        <p>Atributos escolhidos</p>
                        <p class="help-block">Aqui você pode colocar o tipo do seu atributo.</p>
                        <div ng-repeat="x in categoriaAtributos" ng-model="repeat" >

                            <label>Tipo do atributo {{x}}</label><br>


                            <div class="col-md-2">Data: <label><input type="radio" name="tipo[{{$index}}]" required
                                                                      value="data"
                                                                      class="minimal"></label>
                            </div>
                            <div class="col-md-2">Número: <label><input type="radio" name="tipo[{{$index}}]" required
                                                                        value="numero"
                                                                        class="minimal"></label></div>
                            <div class="col-md-2"> Texto: <label><input type="radio" name="tipo[{{$index}}]" required
                                                                        value="texto"
                                                                        class="minimal"></label>
                            </div>
                            <div class="col-md-2">Dinheiro: <label><input type="radio" name="tipo[{{$index}}]" required
                                                                          value="dinheiro"
                                                                          class="minimal"></label></div>
                            <div class="col-md-4">Manter sem alterações: <label><input type="radio"
                                                                                       name="tipo[{{$index}}]" required
                                                                                       value="nenhuma"
                                                                                       id="nenhuma{{$index}}"
                                                                                       class="minimal"></label>
                            </div>

                            <br><br>
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

<script src="js/require.min.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.2.20/angular.min.js"></script>-->
<script src="../plugins/bootstrap-tag-input/bootstrap-tagsinput.min.js"></script>
<script src="../plugins/bootstrap-tag-input/bootstrap-tagsinput-angular.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/rainbow/1.2.0/js/rainbow.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/rainbow/1.2.0/js/language/generic.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/rainbow/1.2.0/js/language/html.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/rainbow/1.2.0/js/language/javascript.js"></script>
<script src="../plugins/bootstrap-tag-input/app.js"></script>
<!--<script src="../plugins/bootstrap-tag-input/app_bs3.js"></script>-->
<script src="../plugins/angular/angular.min.js"></script>


<script src="../plugins/iCheck/icheck.min.js"></script>
<script>
    $(window).resize(function(){
        $("body").setHeight($(window).height());
    })
</script>
<script>





    function limparcampos() {
        $('#frmCadastroUsuarios').each(function () {
            this.reset();
        });
    }

    setTimeout(function () {
        $("#categoriaAtributos").reload()
    }, 200);
</script>

<script>

</script>

</body>
</html>
