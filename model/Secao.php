<?php
require_once "Banco.php";
/**
 * Created by PhpStorm.
 * User: Marcio Lucas
 * Date: 18/04/2016
 * Time: 10:33
 */

class Secao extends Banco
{
    private $id;
    private $nome;
    private $data;

    public function __construct()
    {
        parent::__construct();
        $this->data = date("Y-m-d");
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }



    function cadastrarSecao()
    {
        try {
            $this->tabela = "secao";
            $this->campos = array("nome", "datacriacao");
            $this->valores = array($this->getNome(), date("Y-m-d"));

            return $this->cadastrar();
        } catch (Exception $e) {
            echo "Exceção capturada: " . $e->getMessage();
            return false;
        }

    }

    function alterarSecao()
    {

        $campos_eq_valores = "nome = '$this->nome', dataultimaalteracao = '$this->data'";

        try {
            return $this->alterar("secao", $campos_eq_valores, $this->id);
        } catch (Exception $e) {
            return "Exceção capturada: " . $e->getMessage();

        }
    }

    function excluirSecao($id)
    {
        try {
            return $this->delete("secao", "ativado = 0, dataexclusao = '$this->data'", "id=$id");
        } catch (Exception $e) {
            echo "Exceção capturada: " . $e->getMessage();
            return null;
        }
    }

    function listarSecao()
    {
        $this->tabela = "secao";
        $this->campos = array("id", "nome");
        $this->condicao = "ativado = 1";
        $this->subQntColunasConsulTabela = 0;
        $this->listar();
    }

    function pesquisarSecao()
    {

    }

    function consultarSecao()
    {
        $this->tabela = "secao";
        $this->condicao = "ativado = 1";
        $this->consultar();
        while ($r = mysqli_fetch_array($this->query, MYSQLI_ASSOC)) {
            echo "<option value='" . $r['id'] . "'>" . $r['nome'] . "</option>";
        }


    }

    function consultarProdutoPorSecao($id)
    {
        $this->innerJoin("produto", "secao", "$id", "id", "1=1");
        while ($r = mysqli_fetch_array($this->query, MYSQLI_ASSOC)) {
            echo "<option value='" . $r['id'] . "'>" . $r['nome'] . "</option>";
        }
    }

    function puxarSecaoJaCadastrada($id)
    {
        $this->tabela = "secao";
        $this->condicao = "ativado  =  1 and id = $id";
        $this->consultar();
        $r = mysqli_fetch_array($this->query, MYSQLI_ASSOC);
        if ($id != null || $id != "") {
            return "<option selected='selected' value='" . $r['id'] . "'>" . $r['nome'] . "</option>";
        }else{
            return "<option selected='selected' value='0'>Nenhum</option>";
        }
    }
}