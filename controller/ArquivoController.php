<?php
require_once '../model/Arquivo.php';
require_once '../model/UploadArquivo.php';

/**
 * Created by PhpStorm.
 * User: Carlos Eduardo
 * Date: 19/04/2016
 * Time: 10:21
 */
class ArquivoController
{

    public $arquivo;
    private $uploadArquivo;

    /**
     * @return mixed
     */


    /**
     * BolertimController constructor.
     */
    public function __construct()
    {
        $this->arquivo = new Arquivo();
        $this->uploadArquivo = new UploadArquivo();

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

        if (isset($_GET['forcarDownload']) == "true") {
            $this->forcarDownload("../arquivos/");
        }

    }


    private function cadastrar()
    {
        $this->arquivo->setIdentificador($_POST['arquivoIdentificacao']);
        $this->arquivo->setCliente($_POST['arquivoEmpresa']);
        $this->uploadArquivo->setArquivoNome($_FILES['arquivoUpload']['name']);
        $this->uploadArquivo->setArquivoErro($_FILES['arquivoUpload']['error']);
        $this->uploadArquivo->setArquivoTemporarioNome($_FILES['arquivoUpload']['tmp_name']);
        $this->uploadArquivo->setArquivoExtensao($_FILES['arquivoUpload']['type']);
        $this->arquivo->setIdArquivo($this->uploadArquivo->cadastroArquivo());

        echo ($this->arquivo->cadastroArquivo())? "<script>alert('Cadastro de boletim efetuado com sucesso!')</script> "
            : "<script>alert('Cadastro de boletim não efetuado!')</script>";
//        echo "<script>window.location.replace('../view/frmCadastroBoletim.php');</script>";
    }

    private function alterar()
    {
        $this->arquivo->setId($_POST['id1']);
        $this->arquivo->setIdentificador($_POST['arquivoIdentificacao1']);
        if(isset($_FILES['usuarioImagem1']['name'])) {
            $this->uploadArquivo->setArquivoNome($_FILES['arquivoUpload1']['name']);
            $this->uploadArquivo->setArquivoErro($_FILES['arquivoUpload1']['error']);
            $this->uploadArquivo->setArquivoTemporarioNome($_FILES['arquivoUpload1']['tmp_name']);
            $this->uploadArquivo->setArquivoExtensao($_FILES['arquivoUpload1']['type']);
            $this->arquivo->setIdArquivo($this->arquivo->cadastroArquivo());
        }
        echo $this->arquivo->alterarArquivo() ? "<script>alert('Alteração de boletim feito com sucesso!'); window.location.replace('ArquivoController.php?q=listar');</script>" :
            "<script>alert('Erro na alteração de boletim'); window.location.replace('ArquivoController.php?q=listar');</script>";
    }

    private function listar()
    {
        $this->arquivo->listarArquivo();
    }

    private function excluir()
    {
        echo $this->arquivo->excluirArquivo($_GET['id']);
        echo "<script>window.location.replace('ArquivoController.php?q=listar');</script>";
    }

    public function consulta($tabela, $condicao){
        $this->arquivo->tabela = $tabela;
        $this->arquivo->condicao = $condicao;
        $this->arquivo->consultar();
        
        
    }

    public function listagem(){
        return $this->arquivo->listagem();
    }

    public function retornaNumDeArquivosUpados(){
        return $this->arquivo->retornaNumRegistros("uploads", "ativado=1");
    }

    public function forcarDownload($caminhoArquivo){
        return $this->arquivo->forcarDownload($caminhoArquivo);
    }
    public function consultaClienteCadastrado($id){
       return $this->arquivo->puxarArquivoClienteJaCadastrado($id);
    }

}
new ArquivoController();