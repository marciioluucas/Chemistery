<?php
require_once 'protecaoPaginas.php'
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CataLOG | Sessão expirada</title>
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
    <!-- Icone-->
    <link rel="shortcut icon" href="../favicon.ico"/>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
        body {
            background-image: url("../sources/imgs/lockscreen_backg.png") !important;
            background-repeat: no-repeat;
            position: relative;
            background-size: cover;
            margin: 0 !important;
            padding: 0 !important;
            height: auto;
            top: 0
        }

        @media screen and (min-width: 766px) {

            html {
                margin-left: 11.9%;
            }
        }


    </style>
</head>
<body class="lockscreen" style="padding-left: 12%">
<!-- Automatic element centering -->
<div class="lockscreen-wrapper">
    <div class="lockscreen-logo">
        <a href="login.php"><b>Cata</b>LOG</a>
    </div>
    <!-- User name -->
    <div class="lockscreen-name"><?php echo $_COOKIE['cookieNome'] ?></div>

    <!-- START LOCK SCREEN ITEM -->
    <div class="lockscreen-item">
        <!-- lockscreen image -->
        <div class="lockscreen-image">
            <img src="<?php echo $_COOKIE['cookieImagem'] ?>" alt="User Image">
        </div>
        <!-- /.lockscreen-image -->

        <!-- lockscreen credentials (contains the form) -->
        <form class="lockscreen-credentials" action="../controller/UsuarioController.php" method="post">
            <input style="display: none;" type="text" name="tela" value="lockscreen">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="E-mail ou Usuário" name="usuarioLogin"
                       style="display: none;"
                       value="<?php echo $_COOKIE['cookieEmail'] ?>">
                <input type="password" class="form-control" placeholder="senha" name="usuarioSenha">
                <div class="input-group-btn">
                    <input type="submit" value="Entrar!" class="btn" name="entrar"><i
                        class="fa fa-arrow-right text-muted"></i>
                </div>
            </div>
        </form><!-- /.lockscreen credentials -->

    </div><!-- /.lockscreen-item -->
    <div class="help-block text-center">
        Sua sessão expirou, coloque sua senha para voltar para sua sessão.
    </div>
    <div class="text-center">
        <a href="javascript:myPopup();">Ou entre com uma conta diferente</a>
    </div>
    <div class="lockscreen-footer text-center">
        Copyright &copy; 2013-2016 <b><a href="http://www.gruposalatiel.com" class="text-black">Grupo
                Salatiel</a></b><br>
        All rights reserved
    </div>
</div><!-- /.center -->

<!-- jQuery 2.1.4 -->
<script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="../bootstrap/js/bootstrap.min.js"></script>
</body>
<style>
    .novaAba {
        target-new: tab ! important
    }
</style>
<script>
    $(window).resize(function(){
        $("body").setHeight($(window).height());
    });
    function myPopup() {
        window.open("login.php")
    }

</script>
</html>
<?php
//session_unset();
?>

