<?php
$nome     = isset($_POST['nome']);
$email    = isset($_POST['email']);
$mensagem = isset($_POST['mensagem']);
$corpo  = "Nome: ".$nome."<BR>\n";
$corpo .= "Email: ".$email."<BR>\n";
$corpo .= "Mensagem: ".$mensagem."<BR>\n";
    if (mail("marciioluucas@gmail.com", "Assunto", $corpo)) {
        echo("email enviado com sucesso");
    } else {
        echo("Erro ao enviar e-mail");
    }
?>