<?php
require_once '../model/Pergunta.php';
require_once '../model/Resposta.php';
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
    public $q;

    /**
     * DiscussaoController constructor.
     * @param $produto
     */
    public function __construct($idProduto, $idUsuario)
    {
        $discussao = new Discussao();

        $this->pergunta = $discussao->consultarPergunta($idProduto, $idUsuario);


    }

    public function consultarResp()
    {
        $d = new Discussao();
        return $d->consultarResposta($this->pergunta['pergid']);
    }
}
