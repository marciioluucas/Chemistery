<?php

require_once("../model/Usuario.php");
require_once("../model/Imagem.php");

/**
 * Created by PhpStorm.
 * User: Carlos Eduardo
 * Date: 10/03/2016
 * Time: 08:28
 */
class UsuarioController
{

    private $usuario;
    private $imagem;

    /**
     * @return mixed
     */


    /**
     * usuarioController constructor.
     */
    public function __construct()
    {
        $this->usuario = new Usuario();
        $this->imagem = new Imagem();
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

        if(isset($_GET['p']) == "deslogar"){
            $this->usuario->deslogar($_GET['tela']);
        }

        if (isset($_POST["entrar"]) && $_POST["entrar"] == "Entrar!") {
            $logar = $this->usuario->logar($_POST["usuarioLogin"], $_POST['usuarioSenha'], $_POST['tela']);
            if (isset($logar) && $_POST['tela'] == "login"){
                echo "<script>alert('$logar')</script>";
                echo "<script>window.location.replace('../view/login.php');</script>";
            }
            if (isset($logar) && $_POST['tela'] == "loginC"){
                echo "<script>alert('$logar')</script>";
                echo "<script>window.location.replace('../view/loginUsuarioComum.php');</script>";
            }
            if (isset($logar) && $_POST['tela'] == "lockscreen"){
                echo "<script>alert('$logar')</script>";
                echo "<script>window.location.replace('../view/lockscreen.php');</script>";
            }
        }
    }

    private function cadastrar()
    {
        $this->usuario->setNome($_POST['usuarioNome']);
        $this->usuario->setEmail($_POST['usuarioEmail']);
        $this->usuario->setLogin($_POST['usuarioLogin']);
        $this->usuario->setSenha($_POST['usuarioSenha']);
        $this->usuario->setEmpresa($_POST['usuarioEmpresa']);
        $this->imagem->setArquivoNome($_FILES['usuarioImagem']['name']);
        $this->imagem->setArquivoErro($_FILES['usuarioImagem']['error']);
        $this->imagem->setArquivoTemporarioNome($_FILES['usuarioImagem']['tmp_name']);
        $this->imagem->setArquivoExtensao($_FILES['usuarioImagem']['type']);
        $this->usuario->setImagem($this->imagem->upload());
        echo ($this->usuario->cadastrarUsuario())? "<script>alert('Cadastro de usuario efetuado com sucesso!')</script> "
            : "<script>alert('Cadastro de usuario não efetuado!')</script>";
        echo "<script>window.location.replace('../view/frmCadastroUsuario.php');</script>";
    }

    private function alterar()
    {

        $this->usuario->setId($_POST['id1']);
        $this->usuario->setNome($_POST['usuarioNome1']);
        $this->usuario->setEmail($_POST['usuarioEmail1']);
        $this->usuario->setLogin($_POST['usuarioLogin1']);
        $this->usuario->setSenha($_POST['usuarioSenha1']);
        if(isset($_FILES['usuarioImagem1']['name'])) {
            $this->imagem->setArquivoNome($_FILES['usuarioImagem1']['name']);
            $this->imagem->setArquivoErro($_FILES['usuarioImagem1']['error']);
            $this->imagem->setArquivoTemporarioNome($_FILES['usuarioImagem1']['tmp_name']);
            $this->imagem->setArquivoExtensao($_FILES['usuarioImagem1']['type']);
            $this->usuario->setImagem($this->imagem->upload());
        }
        echo $this->usuario->alterarUsuario() ? "<script>alert('Alteração de usuario feita com sucesso!'); window.location.replace('UsuarioController.php?q=listar');</script>" :
        "<script>alert('Erro na alteração de produto'); window.location.replace('UsuarioController.php?q=listar');</script>";

    }

    private function listar()
    {
        $this->usuario->listarUsuario();
    }

    private function excluir()
    {
        $this->usuario->excluirUsuario($_GET['id']);
        echo "<script>window.location.replace('UsuarioController.php');</script>";
    }
    
    public function retornaNumUsuarios(){
        return $this->usuario->retornaNumRegistros("usuario","ativado=1");
    }

    public function retornaNumUsuariosComDesativados(){
        return $this->usuario->retornaNumRegistros("usuario","1=1");

    }
    
    public function retornaAlgoUsuario($campo_sql, $id_usuario){
        return $this->usuario->retornaAlgoUsuario($campo_sql,$id_usuario);
    }
    
    public function consultaQuantosProdutosCadastradosPeloUsuario($id_usuario){
        return $this->usuario->retornaNumRegistros("produto","usuario_id = $id_usuario");
    }


}

new usuarioController();
