<?php

/**
 * Created by PhpStorm.
 * User: marci
 * Date: 24/02/2017
 * Time: 10:55
 */
class Pergunta
{
    private $usuario;
    private $data;
    private $descricao; //string
    private $produto;
    private $status;
    private $respostaList;

    /**
     * Pergunta constructor.
     * @param $usuario
     * @param $data
     * @param $descricao
     * @param $produto
     * @param $status
     */
    public function __construct($usuario, $data, $descricao, $produto, $status)
    {
        $this->usuario = $usuario;
        $this->data = $data;
        $this->descricao = $descricao;
        $this->produto = $produto;
        $this->status = $status;
    }


    /**
     * @return mixed
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * @param mixed $usuario
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    /**
     * @return mixed
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * @param mixed $descricao
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    /**
     * @return mixed
     */
    public function getProduto()
    {
        return $this->produto;
    }

    /**
     * @param mixed $produto
     */
    public function setProduto($produto)
    {
        $this->produto = $produto;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }


    public function cadastroPergunta() {

    }

    public function alterarPergunta() {

    }

    public function listarPergunta() {

    }

    public function listagem() {

    }



}