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
    <link rel="stylesheet" href="../plugins/bootstrap-tag-input/bootstrap-tagsinput-typehead.css">
    <link rel="stylesheet" href="../plugins/bootstrap-tag-input/bootstrap-tagsinput.css">
    <link href="../plugins/iCheck/all.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../plugins/iCheck/square/blue.css">
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <!-- Icone-->
    <link rel="shortcut icon" href="../favicon.ico" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <link rel="stylesheet" href="../plugins/iCheck/square/blue.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <link rel="stylesheet" href="../plugins/iCheck/all.css">
    <![endif]-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
    <style>


        body {
            background-color: #ecf0f5;
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
            Cadastro
            <small>de categorias</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="">Produtos</li>
            <li class="">Categoria</li>
            <li class="active">Cadastro</li>
        </ol>
    </section>
    <div>

        <form action="../controller/CategoriaController.php" method="post" enctype="multipart/form-data"
              id="frmCadastroCategoria">
            <input type="text" name="b" id="b" value="cadastrar" hidden="hidden">
            <div class="box-body">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="categoriaNome">Nome</label>
                        <input type="text" class="form-control" id="categoriaNome" name="categoriaNome" required
                               placeholder="Coloque aqui o nome">
                    </div>
                    <div class="form-group" ng-app="">

                        <label for="categoriaAtributos">Atributos personalizados</label><br>
                        <select class="form-control" id="categoriaAtributos" ng-model="categoriaAtributos"
                                multiple
                                placeholder="+atributos" data-role="tagsinput"></select>
                        <input  value="{{categoriaAtributos}}" name="categoriaAtributos" hidden
                               id="categoriaAtributos">
                        
                        <p class="help-block">Aqui você pode adicionar atributos adicionais a seu produto.</p>


                        <p>Atributos escolhidos</p>
                        <p class="help-block">Aqui você pode colocar o tipo do seu atributo.</p>
                        <div ng-repeat="x in categoriaAtributos">
                            <label>Tipo do atributo {{x}}</label><br>

                            <div class="col-md-3">Data: <label><input type="radio" name="tipo[{{$index}}]"
                                                                      value="data"
                                                                      class="minimal"></label>
                            </div>
                            <div class="col-md-3">Número: <label><input type="radio" name="tipo[{{$index}}]"
                                                                        value="numero"
                                                                        class="minimal"></label></div>
                            <div class="col-md-3"> Texto: <label><input type="radio" name="tipo[{{$index}}]"
                                                                        value="texto"
                                                                        class="minimal"></label>
                            </div>
                            <div class="col-md-3">Dinheiro: <label><input type="radio" name="tipo[{{$index}}]"
                                                                          value="dinheiro"
                                                                          class="minimal"></label></div>

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
    });
    
    function limparcampos() {
        $('#frmCadastroCategoria').each(function () {
            this.reset();
        });
    }


    $(document).ready(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_minimal',
            radioClass: 'iradio_minimal',
            increaseArea: '20%' // optional
        });
    });


</script>

</body>
</html>
