<?php
require_once '../model/Pergunta.php';
require_once '../model/Resposta.php';
require_once '../model/Discussao.php';

/**
 * Created by PhpStorm.
 * User: marci
 * Date: 28/02/2017
 * Time: 13:16
 */
if (isset($_GET['q']) && $_GET['q'] == "new-comment"){
    new DiscussaoController($_POST['produto_id'],$_POST['usuario_id']);
}
class DiscussaoController
{
    public $discussao;
    public $usuario;
    public $pergunta;
    public $respostas;
    public $idProduto;
    public $idUsuario;
    public $produto;
    public $q;

    /**
     * DiscussaoController constructor.
     * @param $produto
     */
    public function __construct($idProduto, $idUsuario)
    {
        $discussao = new Discussao();

        $this->pergunta = $discussao->consultarPergunta($idProduto);

        if (isset($_GET['q']) && $_GET['q'] == "new-comment") {
            $r = new Resposta();
            $r->setDescricao($_POST['descricao']);
            $r->setUsuario($_POST['usuario_id']);
            $r->setPergunta($_POST['pergunta_id']);
            $r->cadastroResposta();
        }

        if (isset($_GET['q']) && $_GET['q'] == "view-more-comments") {
            $this->carregarMaisComentarios();
        }

    }

    public function consultarResp()
    {
        $d = new Discussao();
//        echo "PERGUNTA ID : " . $this->pergunta['pergid'];
        return $d->consultarResposta($this->pergunta['pergid'],isset($_GET['numb-comments']) ? $_GET['numb-comments'] : 8);
    }

    public function numeroTotalDeRespostas() {
        $r = new Resposta();
        return $r->consultarNumeroRespostas($this->pergunta['pergid']);
    }

    public function numeroAtualDeRespostas() {
        $r = new Resposta();
        return $r->consultaNumeroRespostasAtual($this->pergunta['pergid'],isset($_GET['numb-comments']) ? $_GET['numb-comments'] : 8);
    }

    public function carregarMaisComentarios() {
        $r = new Resposta();
        return $r->consultarResposta($this->pergunta['pergid'], isset($_GET['numb-comments']) ? $_GET['numb-comments'] : 8);
    }
}