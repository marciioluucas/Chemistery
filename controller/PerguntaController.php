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

    /**
     * PerguntaController constructor.
     */
    public function __construct()
    {
        if (isset($_GET['q']) == "listar"){
            $pergunta = new Pergunta();
            $pergunta->listagem();
    }
    }


}
new PerguntaController();