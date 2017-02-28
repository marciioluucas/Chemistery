<?php
require_once '../model/Pergunta.php';
require_once '../model/Discussao.php';

/**
 * Created by PhpStorm.
 * User: marci
 * Date: 28/02/2017
 * Time: 13:16
 */
class DiscussaoController
{
    public $discussao;
    public $usuario;
    public $pergunta;
    public $respostas;
    public $idProduto;
    public $idUsuario;
    public $produto;

    /**
     * DiscussaoController constructor.
     * @param $produto
     */
    public function __construct($idProduto, $idUsuario)
    {
        $discussao = new Discussao();
        $discussao->consultarPergunta($idProduto, $idUsuario);
        $this->pergunta = $discussao->getPergunta();
    }


}