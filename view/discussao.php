<?php
/**
 * Created by PhpStorm.
 * User: marci
 * Date: 26/02/2017
 * Time: 16:06
 */
require_once '../view/protecaoPaginas.php';
require_once '../controller/DiscussaoController.php';
$discussaoController = new DiscussaoController($_GET['id'], $_SESSION['idUsuario']);

?>
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
<div class="container ">
    <div class="row center-block">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <!-- Box Comment -->
            <div class="box box-widget">
                <div class='box-header with-border'>
                    <div class='user-block'>
                        <img class='img-circle' src='<?php echo $discussaoController->pergunta['imagem'] ?>'
                             alt='user image' />
                        <span class='username'><a
                                    href="#"><?php echo $discussaoController->pergunta['nome'] ?></a></span>
                        <span class='description'><?php echo $discussaoController->pergunta['datahora'] ?></span>
                    </div>
                </div>
                <div class='box-body'>
                    <img class="img-responsive pad" src="../dist/img/photo2.png" alt="Photo">
                    <p><?php echo $discussaoController->pergunta['descricao'] ?></p>
                </div>
                <div class='box-footer box-comments'>
                    <?php
                    include_once 'respostas.php';
                    ?>
                </div><!-- /.box-footer -->
                <div class="box-footer">

                    <img class="img-responsive img-circle img-sm" src="<?php echo $_SESSION['imagemUsuario'] ?>"
                         alt="alt text">
                    <!-- .img-push is used to add margin to elements next to floating images -->
                    <div class="img-push">
                        <input type="text" class="form-control input-sm send-nudes"
                               placeholder="Escreva seu comentario">
                    </div>

                </div><!-- /.box-footer -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div>
    <script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script>
        var isDisabledMoreComments = true;
        var conn = 8;
        function atualizar() {
            if(isDisabledMoreComments){
                $(".box-comments").load("respostas.php?id-produto=<?php echo $_GET['id-produto'] ?>");
            }else{
                $(".box-comments").load("respostas.php?id-produto=<?php echo $_GET['id-produto'] ?>&"+
                    "q=view-more-comments&numb-comments=" + conn);
            }
        }

            setInterval("atualizar()", 3500);


        $(function () {
            atualizar();
        });

        $(document).ready(function () {
            $(".send-nudes").on('keypress', function () {
                if (window.event.keyCode == 13) {
                    $.post("../controller/DiscussaoController.php?q=new-comment",
                        {
                            produto_id: <?php echo $_GET['id-produto']?>,
                            usuario_id: <?php echo $_SESSION['idUsuario']; ?>,
                            pergunta_id: <?php echo $discussaoController->pergunta['pergid'];?>,
                            descricao: $('.send-nudes').val()
                        })
                        .done(function (data) {
                            console.log("Sucesso!" + data);
                            $(".send-nudes").val("");
                        });
                }
            });



        });

        function moreComments(){
            isDisabledMoreComments = false;
            conn = conn + 8;
        }

        <?php
        if(isset($_GET['from']) and $_GET['from'] = "botao-responder") {
            echo "$('.container').addClass('content-wrapper')";
        }
        ?>
    </script>
    <div class="col-lg-offset-3"></div>
</div>
