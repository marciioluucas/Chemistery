<?php
require_once "../model/Pergunta.php";

/**
 * Created by PhpStorm.
 * User: marci
 * Date: 24/02/2017
 * Time: 11:23
 */
class PerguntaController
{

    public function __construct()
    {
        if (isset($_GET['q']) and $_GET['q'] == "listar") {
            $pergunta = new Pergunta();
            $pergunta->listagem();
        }

        if (isset($_GET['q']) and $_GET['q'] == "cadastrar") {
            $this->cadastroPergunta();
        }
    }

    public function cadastroPergunta()
    {
        $p = new Pergunta();
        $p->setProduto($_POST['perguntaProduto']);
        $p->setUsuario($_POST['perguntaIdUsuario']);
        $p->setDescricao($_POST['perguntaDescricao']);
        $p->cadastroPergunta();

    }

    public function consultaPerguntaByIdUsuario($idUsuario)
    {
        $pergunta = new Pergunta();
        return $pergunta->consultaPerguntaBy($idUsuario);
    }


    /**
     * PerguntaController constructor.
     */

}

new PerguntaController();