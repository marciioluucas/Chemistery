<?php

/**
 * Created by PhpStorm.
 * User: marcio
 * Date: 24/02/2017
 * Time: 10:56
 */

class Resposta
{
    private $usuario;
    private $datahora;
    private $pergunta;
    private $descricao;
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
    public function getDatahora()
    {
        return $this->datahora;
    }

    /**
     * @param mixed $datahora
     */
    public function setDatahora($datahora)
    {
        $this->datahora = $datahora;
    }

    /**
     * @return mixed
     */
    public function getPergunta()
    {
        return $this->pergunta;
    }

    /**
     * @param mixed $pergunta
     */
    public function setPergunta($pergunta)
    {
        $this->pergunta = $pergunta;
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

    public function cadastroResposta() {

    }

    public function alterarResposta() {

    }

    public function listarResposta() {

    }

    public function listagem() {

    }
}