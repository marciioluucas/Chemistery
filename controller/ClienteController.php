<?php
require_once '../model/Cliente.php';

/**
 * Created by PhpStorm.
 * User: Márcio Lucas
 * Date: 23/06/2016
 * Time: 13:33
 */
class ClienteController
{

    private $cliente;
    /**
     * @return mixed
     */


    /**
     * clienteController constructor.
     */
    public function __construct()
    {
        $this->cliente = new Cliente();

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
        $this->cliente->setNome($_POST['clienteNome']);
        $this->cliente->setDescricao($_POST['clienteDescricao']);
        $this->cliente->setTipo($_POST['clienteTipo']);
        $this->cliente->setCPFouCNPJ($_POST['clienteIdentificacao']);
        echo ($this->cliente->cadastrarCliente())? "<script>alert('Cadastro de cliente efetuado com sucesso!')</script> "
            : "<script>alert('Cadastro de cliente não efetuado!')</script>";
        echo "<script>window.location.replace('../view/frmCadastroCliente.php');</script>";
    }

    private function alterar()
    {

        $this->cliente->setId($_POST['id1']);
        $this->cliente->setNome($_POST['clienteNome1']);
        echo ($this->cliente->alterarCliente())? "<script>alert('Alteração de cliente efetuada com sucesso!')</script> "
            : "<script>alert('Alteração de cliente não efetuada!')</script>";
        echo "<script>window.location.replace('ClienteController.php?q=listar');</script>";
    }

    private function listar()
    {
        $this->cliente->listarCliente();
    }

    private function excluir()
    {
        echo $this->cliente->excluirCliente($_GET['id']);
        echo "<script>window.location.replace('ClienteController.php?q=listar');</script>";
    }

    public function consultaClientes(){
        $this->cliente->consultarCliente();
    }



    public function retornaNumDeClientes(){
        return $this->cliente->retornaNumRegistros("cliente", "ativado=1");
    }

}
new ClienteController();