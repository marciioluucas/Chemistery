<?php
require_once 'Banco.php';
/**
 * Created by PhpStorm.
 * User: Márcio Lucas
 * E-mail: marciioluucas@gmail.com
 * Date: 22/06/2016
 * Time: 13:59
 */
class Boletim extends Banco
{
    private $id;
    private $identificador;
    private $id_arquivo;

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
    public function getIdentificador()
    {
        return $this->identificador;
    }

    /**
     * @param mixed $identificador
     */
    public function setIdentificador($identificador)
    {
        $this->identificador = $identificador;
    }

    /**
     * @return mixed
     */
    public function getIdArquivo()
    {
        return $this->id_arquivo;
    }

    /**
     * @param mixed $id_arquivo
     */
    public function setIdArquivo($id_arquivo)
    {
        $this->id_arquivo = $id_arquivo;
    }

    /**
     * @return mixed
     */


    function cadastroBoletim()
    {
        try {
            $this->tabela = "boletim";
            $this->campos = array("arquivo_id", "identificador");
            $this->valores = array($this->id_arquivo, $this->identificador);
            return $this->cadastrar();
        } catch (Exception $e) {
            echo "Exceção capturada: " . $e->getMessage();
            return null;
        }
    }

    function alterarBoletim()
    {
        $campos_eq_valores = "identificador = '$this->identificador', ";
        if ($this->id_arquivo != "" || $this->id_arquivo != null) {
            $campos_eq_valores .= "arquivo_id = '$this->id_arquivo', ";
        }

        try {
            return $this->alterar("produto", $campos_eq_valores, $this->id);
        } catch (Exception $e) {
            return "Exceção capturada: " . $e->getMessage();

        }
    }

    function listarBoletim()
    {
        $this->tabela = "boletim";
        $this->campos = array("id", "identificador", "arquivo_id");
        $this->condicao = "ativado = 1";
        $this->subQntColunasConsulTabela = 1;
        $this->listar();
    }

    function excluirBoletim($id)
    {
        try {
            return $this->delete("boletim", "ativado = 0", "id=$id");
        } catch (Exception $e) {
            echo "Exceção capturada: " . $e->getMessage();
            return null;
        }
    }

}