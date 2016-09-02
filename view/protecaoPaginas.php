<?php
if (!isset($_SESSION)) {
    session_start();
    $idUser = $_SESSION['idUsuario'];
    $nomeUser = $_SESSION['nomeUsuario'];
    $emailUser = $_SESSION['emailUsuario'];
    $loginUser = $_SESSION['loginUsuario'];
    $senhaUser = $_SESSION['senhaUsuario'];
    $imagemUser = $_SESSION['imagemUsuario'];
    $nivelUser = $_SESSION['nivelUsuario'];
    $ativadoUser = $_SESSION['ativadoUsuario'];
    $dataCriacaoUser = $_SESSION['dataCriacaoUsuario'];
    $dataExclusaoUser = $_SESSION['dataExclusaoUsuario'];
    $_COOKIE['cookieImagem'] = $_SESSION['imagemUsuario'];
    $_COOKIE['cookieNome'] = $_SESSION['nomeUsuario'];
    $_COOKIE['cookieEmail'] = $_SESSION['emailUsuario'];


}

if (!isset($_SESSION['idUsuario'])) {
    session_destroy();
    header("Location: login.php?tela=UsuarioNaoLogado");
    exit;
}
