<?php
require_once 'Banco.php';
/**
 * Created by PhpStorm.
 * User: Márcio Lucas
 * E-mail: marciioluucas@gmail.com
 * Date: 22/06/2016
 * Time: 09:49
 */
class Cliente extends Banco
{

    private $id;
    private $nome;
    private $descricao;
    private $tipo; //fisico ou juridico
    private $CPFouCNPJ;

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
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * @param mixed $tipo
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }

    /**
     * @return mixed
     */
    public function getCPFouCNPJ()
    {
        return $this->CPFouCNPJ;
    }

    /**
     * @param mixed $CPFouCNPJ
     */
    public function setCPFouCNPJ($CPFouCNPJ)
    {
        $this->CPFouCNPJ = $CPFouCNPJ;
    }




    function cadastrarCliente()
    {
        try {
            $this->tabela = "cliente";
            $this->campos = array("nome", "descricao","tipo","cpf_ou_cnpj","datacriacao");
            $this->valores = array($this->nome, $this->descricao, $this->tipo, $this->CPFouCNPJ, date("Y-m-d"));

            return $this->cadastrar();
        } catch (Exception $e) {
            echo "Exceção capturada: " . $e->getMessage();
            return false;
        }

    }

    function alterarCliente()
    {

        $campos_eq_valores = "nome = '$this->nome', descricao= '$this->descricao',";
        $campos_eq_valores .= "tipo='$this->tipo', cpf_ou_cnpj='$this->CPFouCNPJ',";
        $campos_eq_valores .= "dataultimaalteracao = '".date("Y-m-d")."'";

        try {
            return $this->alterar("cliente", $campos_eq_valores, $this->id);
        } catch (Exception $e) {
            return "Exceção capturada: " . $e->getMessage();

        }
    }

    function excluirCliente($id)
    {
        try {
            return $this->delete("cliente", "ativado = 0, dataexclusao = '".date("Y-m-d")."'", "id=".$id);
        } catch (Exception $e) {
            echo "Exceção capturada: " . $e->getMessage();
            return null;
        }
    }

    function listarCliente()
    {
        $this->tabela = "cliente";
        $this->campos = array("id", "nome", "tipo", "cpf_ou_cnpj");
        $this->condicao = "ativado = 1";
        $this->subQntColunasConsulTabela = 0;
        $this->listar();
    }

    function pesquisarCliente()
    {

    }

    function consultarCliente()
    {
        $this->tabela = "cliente";
        $this->condicao = "ativado = 1";
        $this->consultar();
        while ($r = mysqli_fetch_array($this->query, MYSQLI_ASSOC)) {
            echo "<option value='" . $r['id'] . "'>" . $r['nome'] . "</option>";
        }


    }

    

}