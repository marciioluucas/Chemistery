<?php
/**
 * Created by PhpStorm.
 * User: marci
 * Date: 28/02/2017
 * Time: 22:32
 */
require_once '../controller/DiscussaoController.php';
require_once '../view/protecaoPaginas.php';
$discussaoController = new DiscussaoController($_GET['id-produto'], $_SESSION['idUsuario']);
$q = $discussaoController->consultarResp();
while ($r = mysqli_fetch_array($q, MYSQLI_ASSOC)) {
    echo "<div class='box-comment'>";
    echo "<img class='img-circle img-sm' src='".$r['imagem']."' alt='user image'>";
    echo "<div class='comment-text'>";
    echo "<span class='username'>";
    echo $r['nome'];
    echo "<span class='text-muted pull-right'>" . $r['datahora'] . "</span>";
    echo "</span>" . $r['descricao'];
    echo "</div>";
    echo "</div>";
}


