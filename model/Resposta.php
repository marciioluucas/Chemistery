<?php

/**
 * Created by PhpStorm.
 * User: marci
 * Date: 24/02/2017
 * Time: 10:56
 */
class Resposta
{
    private $usuario;
    private $data;
    private $pergunta;
    private $resposta;
    private $produto;

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
    public function getResposta()
    {
        return $this->pergunta;
    }

    /**
     * @param mixed $pergunta
     */
    public function setResposta($pergunta)
    {
        $this->pergunta = $pergunta;
    }

    /**
     * @return mixed
     */
    public function getPergunta()
    {
        return $this->resposta;
    }

    /**
     * @param mixed $resposta
     */
    public function setPergunta($resposta)
    {
        $this->resposta = $resposta;
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


    public function cadastroResposta() {

    }

    public function alterarResposta() {

    }

    public function listarResposta() {

    }

    public function listagem() {

    }
}