<?php
require_once '../model/Pergunta.php';
/**
 * Created by PhpStorm.
 * User: marci
 * Date: 28/02/2017
 * Time: 13:16
 */
class DiscussaoController
{
    public $usuario;
    public $pergunta;
    public $idProduto;
    public $produto;

    /**
     * DiscussaoController constructor.
     * @param $produto
     */
    public function __construct($idProduto)
    {
        $this->idProduto = $idProduto;
        $this->pergunta = new Pergunta();

    }

    /**
     * DiscussaoController constructor.
     */



}