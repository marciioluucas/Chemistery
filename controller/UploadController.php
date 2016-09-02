<?php
require_once '../model/Arquivo.php';
require_once '../model/UploadArquivo.php';

/**
 * Created by PhpStorm.
 * User: Carlos Eduardo
 * Date: 19/04/2016
 * Time: 10:21
 */
class UploadController
{

    private $upload;
    private $arquivo;
    /**
     * @return mixed
     */


    /**
     * BolertimController constructor.
     */
    public function __construct()
    {
        $this->upload = new Arquivo();
        $this->arquivo = new UploadArquivo();

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
        $this->upload->setIdentificador($_POST['uploadIdentificacao']);
        $this->arquivo->setArquivoNome($_FILES['arquivoUpload']['name']);
        $this->arquivo->setArquivoErro($_FILES['arquivoUpload']['error']);
        $this->arquivo->setArquivoTemporarioNome($_FILES['arquivoUpload']['tmp_name']);
        $this->arquivo->setArquivoExtensao($_FILES['arquivoUpload']['type']);
        $this->upload->setIdArquivo($this->arquivo->cadastroArquivo());

        echo ($this->upload->cadastroArquivo())? "<script>alert(upload)</script> "
            : "<script>alert('Cadastro de upload não efetuado!')</script>";
//        echo "<script>window.location.replace('../view/frmCadastroArquivo.php');</script>";
    }

    private function alterar()
    {
        $this->upload->setId($_POST['id1']);
        $this->upload->setIdentificador($_POST['uploadIdentificacao']);
        if(isset($_FILES['usuarioImagem1']['name'])) {
            $this->arquivo->setArquivoNome($_FILES['arquivoUpload1']['name']);
            $this->arquivo->setArquivoErro($_FILES['arquivoUpload1']['error']);
            $this->arquivo->setArquivoTemporarioNome($_FILES['arquivoUpload1']['tmp_name']);
            $this->arquivo->setArquivoExtensao($_FILES['arquivoUpload1']['type']);
            $this->upload->setIdArquivo($this->arquivo->cadastroArquivo());
        }
        echo $this->upload->alterarArquivo() ? "<script>alert('Alteração de upload feito com sucesso!'); window.location.replace('UsuarioController.php?q=listar');</script>" :
            "<script>alert('Erro na alteração de upload'); window.location.replace('UploadController.php');</script>";
    }

    private function listar()
    {
        $this->upload->listarArquivo();
    }

    private function excluir()
    {
        echo $this->upload->excluirArquivo($_GET['id']);
        echo "<script>window.location.replace('SecaoController.php?q=listar');</script>";
    }

    public function consultaBoletins(){
        $this->upload->consultar();
    }

  

    public function retornaNumDeBoletins(){
        return $this->upload->retornaNumRegistros("upload", "ativado=1");
    }

}
new UploadController();