<?php

$dir = '../imagens/wallpapersLogin/';
$files1 = scandir($dir);
$bg = $files1;
$i = rand(2, count($bg) - 1);
$selectedBg = "$bg[$i]";
if(isset($_GET['tela']) == "UsuarioNaoLogado") {
    echo "<script>alert('Você foi redirecionado pois não está logado!')</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CataLOG v1.0 | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="theme-color" content="#605ca8">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../plugins/iCheck/square/blue.css">
    <!-- Icone-->
    <link rel="shortcut icon" href="../favicon.ico"/>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <![endif]-->

    <style>
        html {
            margin: 0 !important;
            padding: 0 !important;
        }

        body {
            margin: 0;
            padding: 0;
            display: none;
        }

        .background {
            background: url('../imagens/wallpapersLogin/<?php echo $selectedBg; ?>') no-repeat;
            position: relative;
            background-size: cover;
            margin: 0 !important;
            padding: 0 !important;
            display: none;
            height: auto;
            top: 0;


        }


        .login-box {
            display: none;
        }


    </style>

    <script type="text/javascript">


        $(document).ready(function () {
            $('.background').fadeIn('slow');
            $('#login').fadeIn("fast");
//           var backgroundHeight = $('html').height();
//           console.log(backgroundHeight);
//            $('.background').css('height', backgroundHeight);
        })
    </script>
</head>
<body class="background cover-image">
<div class="login-box" id="login">

    <div class="login-box-body">
        <div class="login-logo">
            <a href="#">Cata<b>LOG</b></a>
        </div><!-- /.login-logo -->
        <p class="login-box-msg">Logue-se para começar a usar</p>
        <form action="../controller/UsuarioController.php" method="post">
            <div class="form-group has-feedback">
                <input type="text" class="form-control" placeholder="E-mail" name="usuarioLogin" id="usuarioLogin">
                <input style="display: none;" type="text" name="tela" value="login">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="Senha" name="usuarioSenha">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label disabled="disabled">
                            <input type="checkbox" disabled> Lembre-se de mim
                        </label>
                    </div>
                </div><!-- /.col -->
                <div class="col-xs-4" style="margin-top: 60px">
                    <input type="submit" value="Entrar!" class="btn btn-primary btn-block btn-flat bg-purple" style="border: #464382;" name="entrar">
                </div><!-- /.col -->
            </div>
        </form>

<!--        <div class="social-auth-links text-center">-->
<!--            <p>- OU -</p>-->
<!--            <a href="#" class="btn btn-block btn-social btn-facebook btn-flat" disabled=""><i-->
<!--                    class="fa fa-facebook"></i> Entre usando seu Facebook</a>-->
<!--            <a href="#" class="btn btn-block btn-social btn-google btn-flat" disabled=""><i-->
<!--                    class="fa fa-google-plus"></i> Entre usando seu Google+</a>-->
<!--        </div><!-- /.social-auth-links -->

        <a href="#" id="linkEsqueciSenha">Esqueci minha senha</a><br>

    </div><!-- /.login-box-body -->
</div>
    <div class="login-box" id="esqueciSenha">

        <div class="login-box-body" >
            <div class="login-logo" style="margin-bottom: 74px">
                <a href="#">Cata<b>LOG</b></a>
            </div><!-- /.login-logo -->
            <p class="login-box-msg">Enviaremos sua senha para o email cadastrado</p>
            <form action="../controller/UsuarioController.php" method="post">
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="E-mail" name="usuarioLogin" id="usuarioEmailRestauracao">
                    <input style="display: none;" type="text" name="tela" value="esqueciSenha">

                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-12 text-right" style="margin-top: 70px; margin-bottom: 10px">
                        <input type="submit" value="Restaurar!" class="btn btn-primary btn-block btn-flat bg-purple" style="border: #464382;" name="restaurar">
                    </div><!-- /.col -->
                </div>
            </form>

            <!--        <div class="social-auth-links text-center">-->
            <!--            <p>- OU -</p>-->
            <!--            <a href="#" class="btn btn-block btn-social btn-facebook btn-flat" disabled=""><i-->
            <!--                    class="fa fa-facebook"></i> Entre usando seu Facebook</a>-->
            <!--            <a href="#" class="btn btn-block btn-social btn-google btn-flat" disabled=""><i-->
            <!--                    class="fa fa-google-plus"></i> Entre usando seu Google+</a>-->
            <!--        </div><!-- /.social-auth-links -->

        </div><!-- /.login-box-body -->
</div>
<!-- jQuery 2.1.4 -->
<script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="../bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../plugins/iCheck/icheck.min.js"></script>
<script>
    $(window).resize(function(){
        $("body").setHeight($(window).height());
    });
    
    $(document).ready(function(){
       $("#usuarioLogin").focus();
    });
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });


    $("#linkEsqueciSenha").click(function(){
        $("#login").hide();
        $("#esqueciSenha").fadeIn('fast');
        $("#usuarioEmailRestauracao").focus();
    })

</script>

</body>
</html>

