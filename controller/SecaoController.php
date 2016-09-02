<?php
require_once '../model/Secao.php';

/**
 * Created by PhpStorm.
 * User: Carlos Eduardo
 * Date: 19/04/2016
 * Time: 10:21
 */
class SecaoController
{

    private $secao;
    /**
     * @return mixed
     */


    /**
     * secaoController constructor.
     */
    public function __construct()
    {
        $this->secao = new Secao();

        if (isset($_POST['b']) == 'cadastrar') {
            $this->cadastrar();
        }
        if (isset($_POST['acao']) == 'alterar') {
            $this->alterar();
        }
        if (isset($_GET['q']) == "listar") {
            $this->listar();
        }
        if (isset($_GET['q']) == "excluir" && isset($_GET['id'])) {
            $this->excluir();
        }

    }


    private function cadastrar()
    {
        $this->secao->setNome($_POST['secaoNome']);
        echo ($this->secao->cadastrarSecao())? "<script>alert('Cadastro de secao efetuado com sucesso!')</script> "
            : "<script>alert('Cadastro de secao não efetuado!')</script>";
        echo "<script>window.location.replace('../view/frmCadastroSecao.php');</script>";
    }

    private function alterar()
    {

        $this->secao->setId($_POST['id1']);
        $this->secao->setNome($_POST['secaoNome1']);
        echo ($this->secao->alterarSecao())? "<script>alert('Alteração de secao efetuada com sucesso!')</script> "
            : "<script>alert('Alteração de secao não efetuada!')</script>";
        echo "<script>window.location.replace('SecaoController.php?q=listar');</script>";
    }

    private function listar()
    {
        $this->secao->listarSecao();
    }

    private function excluir()
    {
        echo $this->secao->excluirSecao($_GET['id']);
        echo "<script>window.location.replace('SecaoController.php?q=listar');</script>";
    }

    public function consultaSecaos(){
        $this->secao->consultarSecao();
    }

    public function puxarSecaoJaCadastrada($id) {
        return $this->secao->puxarSecaoJaCadastrada($id);
    }
    
    public function retornaNumDeSecoes(){
        return $this->secao->retornaNumRegistros("secao", "ativado=1");
    }

}
new SecaoController();