<?php
require_once "../model/Banco.php";

/**
 * Created by PhpStorm.
 * User: marci
 * Date: 24/02/2017
 * Time: 10:55
 */
class Pergunta extends Banco
{
    private $usuario;
    private $data;
    private $descricao; //string
    private $produto;
    private $status;


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


    public function cadastroPergunta()
    {
        $this->tabela = "pergunta";
        $this->campos = array("produto_id", "usuario_id", "descricao", "datahora");
        $this->valores = array($this->produto, $this->usuario, $this->descricao, date("Y-m-d H:i:s"));
        if ($this->cadastrar()) {
            return true;
        } else {
            return false;
        }

    }

    public function alterarPergunta()
    {

    }

    public function listarPergunta()
    {

    }

    public function listagem()
    {

        $this->tabela = "pergunta";
        $this->campos = array("id", "produto_id", "status");
        $this->condicao = "ativado = 1 ";
        $this->subQntColunasConsulTabela = 0;
        $this->listar();
    }

    public function consultarPergunta($idPergunta)
    {
        $this->tabela = "pergunta";
        return $this->innerJoin("usuario", "pergunta", "usuario_id", "usuario.id",
            "pergunta.id = " . $idPergunta,
            ["usuario.id as userid", "nome", "datahora", "pergunta.id as pergid", "produto_id", "descricao", "imagem"], null, null, true);

    }

    public function consultaPerguntaBy($condicoes)
    {
        $this->tabela = "pergunta";
        return $this->innerJoin("usuario", "pergunta", "usuario_id", "usuario.id",
            $condicoes,
            ["usuario.id as userid", "nome", "datahora", "pergunta.id as pergid", "produto_id", "descricao", "imagem", "status"], null, null, true);

    }
}
//
//$p =  new Pergunta();
//
//print_r($p->consultarPergunta(1));
