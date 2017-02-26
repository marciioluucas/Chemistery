<?php
/**
 * Created by PhpStorm.
 * User: marci
 * Date: 26/02/2017
 * Time: 16:06
 */
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
<div class="row center-block">
    <div class="col-md-6">
        <!-- Box Comment -->
        <div class="box box-widget">
            <div class='box-header with-border'>
                <div class='user-block'>
                    <img class='img-circle' src='../dist/img/user1-128x128.jpg' alt='user image'>
                    <span class='username'><a href="#">{{NOME_USUARIO}}</a></span>
                    <span class='description'>{{HORARIO}}</span>
                </div>
            </div>
            <div class='box-body'>
                <img class="img-responsive pad" src="../dist/img/photo2.png" alt="Photo">
                <p>{{PERGUNTA}}</p>
            </div>
            <div class='box-footer box-comments'>
                <div class='box-comment'>
                    <!-- User image -->
                    <img class='img-circle img-sm' src='../dist/img/user3-128x128.jpg' alt='user image'>
                    <div class='comment-text'>
                      <span class="username">
                        {{USUARIO_RESPOSTA}}
                        <span class='text-muted pull-right'>{{HORARIO}}</span>
                      </span><!-- /.username -->
                       {{RESPOSTA}}
                    </div><!-- /.comment-text -->
                </div><!-- /.box-comment -->
            </div><!-- /.box-footer -->
            <div class="box-footer">
                <form action="#" method="post">
                    <img class="img-responsive img-circle img-sm" src="../dist/img/user4-128x128.jpg" alt="alt text">
                    <!-- .img-push is used to add margin to elements next to floating images -->
                    <div class="img-push">
                        <input type="text" class="form-control input-sm" placeholder="Escreva seu comentario">
                    </div>
                </form>
            </div><!-- /.box-footer -->
        </div><!-- /.box -->
    </div><!-- /.col -->
</div>
