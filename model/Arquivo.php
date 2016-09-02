<?php
require_once 'Banco.php';

/**
 * Created by PhpStorm.
 * User: Márcio Lucas
 * E-mail: marciioluucas@gmail.com
 * Date: 22/06/2016
 * Time: 13:59
 */
class Arquivo extends Banco
{
    private $id;
    private $identificador;
    private $id_arquivo;
    private $cliente;

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
    public function getCliente()
    {
        return $this->cliente;
    }

    /**
     * @param mixed $cliente
     */
    public function setCliente($cliente)
    {
        $this->cliente = $cliente;
    }

    /**
     * @return mixed
     */


    function cadastroArquivo()
    {
        try {
            $this->tabela = "uploads";
            $this->campos = array("arquivo_id", "identificador", "cliente_id");
            $this->valores = array($this->id_arquivo, $this->identificador, $this->cliente);
            return $this->cadastrar();
        } catch (Exception $e) {
            echo "Exceção capturada: " . $e->getMessage();
            return null;
        }
    }

    function alterarArquivo()
    {
        $campos_eq_valores = "identificador = '$this->identificador', cliente = '" . $this->cliente . "'";
        if ($this->id_arquivo != "" || $this->id_arquivo != null) {
            $campos_eq_valores .= "arquivo_id = '$this->id_arquivo', ";
        }

        try {
            return $this->alterar("produto", $campos_eq_valores, $this->id);
        } catch (Exception $e) {
            return "Exceção capturada: " . $e->getMessage();

        }
    }

    function listarArquivo()
    {
        $this->tabela = "arquivo";
        $this->campos = array("id", "nome_original", "extensao");
        $this->condicao = "ativado = 1";
        $this->subQntColunasConsulTabela = 0;

        $this->listar();
    }


    function listagem()
    {
        $this->innerJoin($this->retornaSQLInnerJoinSemSelect("uploads", "arquivo", "arquivo.id", "arquivo_id"), "cliente", "cliente_id", "cliente.id", "cliente_id = " . $_SESSION['empresaUsuario']);
//        echo $this->getSql();


        $i = 0;
        if (mysqli_num_rows($this->query) > 0) {
            while ($r = mysqli_fetch_array($this->query, MYSQLI_ASSOC)) {
                echo " <tr>
                    <td data-title=\"#\">" . $i++ . "</td>
                    <td data-title=\"Nome do arquivo\">" . $r['identificador'] . "</td>
                    <td data-title=\"Extensão\" class=\"numeric\">" . strtoupper($r['extensao']) . "</td>
                    <td data-title=\"Visualizar\" class=\"numeric\" style='text-align: center'><a href='../controller/ArquivoController.php?forcarDownload=true&arquivo=".$r['nome_original']."'><i class=\"fa fa-download\" aria-hidden=\"true\"></i></a></td>
                    <td data-title=\"Baixar\" class=\"numeric\" style='text-align: center'><a href='" . $r['caminho'] . "'><i class=\"fa fa-eye\" aria-hidden=\"true\"></i></a></td>

                </tr>";
//            echo "<tr><td>" . $r['identificador'] . "</td><td><a href='" . $r['caminho'] . "'>" . $r['caminho'] . "</a></td><td>" . $r['nome'] . "</td></tr>";
            }

        } else {
            echo " <tr>
                    <td data-title=\"#\" colspan='5'> Nenhum arquivo encontrado :(</td>
                </tr>";
        }
    }

    function excluirArquivo($id)
    {
        try {
            return $this->delete("arquivo", "ativado = 0", "id=$id");
        } catch (Exception $e) {
            echo "Exceção capturada: " . $e->getMessage();
            return null;
        }
    }

    function forcarDownload($caminhoDoArquivo)
    {

        define('DIR_DOWNLOAD', $caminhoDoArquivo);
        $arquivo = $_GET['arquivo'];
        $arquivo = filter_var($arquivo, FILTER_SANITIZE_STRING);
        $arquivo = basename($arquivo);
        $caminho_download = DIR_DOWNLOAD . $arquivo;


        if (!file_exists($caminho_download))
            die('Arquivo não existe!');
        header('Content-type: octet/stream');
        header('Content-disposition: attachment; filename="'.$arquivo.'";');
        header('Content-Length: '.filesize($caminho_download));
       return readfile($caminho_download);
    }



    function puxarArquivoClienteJaCadastrado($id)
    {
        $this->tabela = "cliente";
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