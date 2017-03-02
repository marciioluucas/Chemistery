<?php

/**
 * Created by PhpStorm.
 * User: marci
 * Date: 28/02/2017
 * Time: 13:08
 */
class Discussao
{
    private $pergunta;
    private $resposta;
    private $usuarioPergunta;
    private $usuarioResposta;
    private $produto;


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
    public function getResposta()
    {
        return $this->resposta;
    }

    /**
     * @param mixed $resposta
     */
    public function setResposta($resposta)
    {
        $this->resposta = $resposta;
    }

    /**
     * @return mixed
     */
    public function getUsuarioPergunta()
    {
        return $this->usuarioPergunta;
    }

    /**
     * @param mixed $usuarioPergunta
     */
    public function setUsuarioPergunta($usuarioPergunta)
    {
        $this->usuarioPergunta = $usuarioPergunta;
    }

    /**
     * @return mixed
     */
    public function getUsuarioResposta()
    {
        return $this->usuarioResposta;
    }

    /**
     * @param mixed $usuarioResposta
     */
    public function setUsuarioResposta($usuarioResposta)
    {
        $this->usuarioResposta = $usuarioResposta;
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




    public function consultarPergunta($idProduto)
    {
        $p = new Pergunta();

        return mysqli_fetch_array($p->consultarPergunta($idProduto), MYSQLI_ASSOC);
    }

    public function consultarResposta($idPergunta, $limit) {
        $r = new Resposta();
        return $r->consultarResposta($idPergunta,$limit);
    }

    public function consultarProduto($idProduto)
    {
        $p = new Produto();
        $p->condicao = "id = $idProduto";
        $p->consultar();
        $this->produto = $p->result;
    }



}