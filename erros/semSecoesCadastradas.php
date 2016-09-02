<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Seção não encontrada</title>
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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Seção
            <small>não encontrada</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Erros</a></li>
            <li class="active">Categoria não cadastrada</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="error-page">
            <h2 class="headline text-yellow">:(</h2>
            <div class="error-content">
                <h3><i class="fa fa-warning text-yellow"></i> Opa! Encontramos algo errado.</h3>
                <p>
                    Acho que você não cadastrou nenhuma seção. Um produto não pode ser cadastrado sem pelo menos uma
                    seção registrada na aplicação.
                </p>
                <div class="search-form">
                    <div class="input-group">
                        <!--                            <input type="text" name="search" class="form-control" placeholder="Search">-->
                        <span class="form-control text-center" id="cadastrar-categoria">Cadastrar uma</span>
                        <div class="input-group-btn">
                            <button type="submit" class="btn btn-danger btn-flat"
                                    style="background-color: #f39c12 !important; border-color: #f39c12 !important;" href="#" id="cadastrar-categoria-btn">
                                <i class="fa fa-plus-circle"></i></button>


                        </div>
                    </div><!-- /.input-group -->
                </div>
            </div>
        </div><!-- /.error-page -->

    </section><!-- /.content -->
</div><!-- /.content-wrapper -->


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

<script src="../plugins/angular/angular.min.js"></script>

<script>
    //    $("#cadastrar-categoria-btn").click(function(){
    //        $("body").load("");
    //    })

    $(document).ready(function () {
        $("#cadastrar-categoria-btn").click(function () {

            $(window.document.location).attr('href', '../view/frmCadastroSecao.php');
        });
    })


</script>
</body>
</html>
