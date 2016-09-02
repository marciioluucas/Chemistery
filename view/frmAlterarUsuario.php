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
    <!-- Icone-->
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
    </style>
</head>
<body>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Alteração
            <small>de usuarios</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="">Usuarios</li>
            <li class="active">Cadastro</li>
        </ol>
    </section>
    <div>

        <form action="../controller/UsuarioController.php" method="post" enctype="multipart/form-data"
              id="frmAlterarUsuario">
            <input type="text" name="id1" id="id1" hidden="hidden"
                   value="<?php echo $id = (isset($_GET['id'])) ? $_GET['id'] : 'nenhum'; ?>"/>
            <input type="text" name="acao" id="acao" value="alterar" hidden="hidden"/>

            <div class="box-body">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="usuarioNome1">Nome</label>
                        <input type="text" class="form-control" id="usuarioNome1" name="usuarioNome1" required
                               value="<?php echo $_GET['nome'] ?>"
                               placeholder="Coloque aqui o nome">
                    </div>
                    <div class="form-group">
                        <label for="usuarioEmail1">E-mail</label>
                        <input type="email" class="form-control" id="usuarioEmail1" name="usuarioEmail1" required
                               value="<?php echo $_GET['email'] ?>"
                               placeholder="Coloque aqui a e-mail">
                    </div>

                    <div class="form-group">
                        <label for="usuarioLogin1">Login</label>
                        <input type="text" class="form-control" id="usuarioLogin1" name="usuarioLogin1" required
                               value="<?php echo $_GET['login'] ?>"
                               placeholder="Coloque aqui o login">
                    </div>

                    <div class="form-group">
                        <label for="usuarioSenha1">Senha</label>
                        <input type="password" class="form-control" id="usuarioSenha1" name="usuarioSenha1" required
                               placeholder="Coloque aqui a senha"
                               value="<?php echo $_GET['senha'] ?>">
                    </div>
                </div>
                <div class="col-lg-6">
                    <label for="usuarioimagem1">Imagem</label>

                    <input type="file" class="form-control" id="usuarioimagem1" name="usuarioImagem1" multiple>
                    <p class="help-block">Para melhor vizualização recomendamos imagens 256 x 256 ou maior e do
                        formato .jpg
                        ou .png</p>
                    <div class="col-lg-3"><img src="../imagens/<?php echo $_GET['imagem'] ?>" id="preview-da-imagem" 
                                            class="img-circle"   width="190" height="190">
                    </div>
                    <!-- /.box-body -->
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

<script>
    $(window).resize(function(){
        $("body").setHeight($(window).height());
    });
    
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader1 = new FileReader();
            reader1.onload = function (e) {
                $('#preview-da-imagem').attr('src', e.target.result);
            };
            reader1.readAsDataURL(input.files[0]);

        }
    }

    $("#usuarioimagem1").change(function () {
        readURL(this);
    });


    function limparcampos() {
        $('#frmCadastroUsuarios').each(function () {
            this.reset();
        });
    }
</script>

</body>
</html>
