<?php
require_once 'Banco.php';
/**
 * Created by PhpStorm.
 * User: marcio
 * Date: 24/02/2017
 * Time: 10:56
 */

class Resposta extends Banco
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
        try {
            $this->tabela = "resposta";
            $this->campos = array("usuario_id", "pergunta_id", "descricao", "datahora");
            $this->valores = array($this->getUsuario(), $this->getPergunta(), $this->getDescricao(),
                date("Y-m-d H:i:s"));
            return $this->cadastrar();
        } catch (Exception $e) {
            echo "Exceção capturada: " . $e->getMessage();
            return null;
        }
    }

    public function alterarResposta() {

    }

    public function consultarResposta($idPergunta, $limit) {
        $this->tabela = "resposta";
        $sqlInnerJoin = $this->innerJoin("usuario", "resposta", "usuario_id", "usuario.id",
            "pergunta_id=".$idPergunta, ["nome","usuario.id as userId",
                "imagem", "resposta.id as respid", "descricao", "datahora"],"datahora desc",$limit,false);
//        echo $sqlInnerJoin;
        return $this->consultaComSql("SELECT * FROM (".$sqlInnerJoin.") sub order by datahora asc");
    }

    public function consultarNumeroRespostas($idPergunta) {
        return $this->retornaNumRegistros("resposta", "pergunta_id = " . $idPergunta);
    }

    public function consultaNumeroRespostasAtual($idPergunta,$limit) {
        $this->tabela = "resposta";
        $sqlInnerJoin = $this->innerJoin("usuario", "resposta", "usuario_id", "usuario.id",
            "pergunta_id=".$idPergunta, ["nome","usuario.id as userId",
                "imagem", "resposta.id as respid", "descricao", "datahora"],"datahora desc",$limit,false);
        return $this->retornaNumRegistrosDigitandoSQL("SELECT * FROM (".$sqlInnerJoin.") sub order by datahora asc");
    }
}
//$r = new Resposta();
////
//$r->consultarResposta(1);
//$q = $r->query;
//    while($row = mysqli_fetch_array($q, MYSQLI_ASSOC)){
//        echo    $row['descricao'] ."\n";
//    }
