<?php

require_once("../model/Categoria.php");

/**
 * Created by PhpStorm.
 * User: Carlos Eduardo
 * Date: 10/03/2016
 * Time: 08:28
 */
class CategoriaController
{

    private $categoria;
    /**
     * @return mixed
     */


    /**
     * categoriaController constructor.
     */
    public function __construct()
    {
        $this->categoria = new Categoria();

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

    private function transformaCampoEmArray()
    {
        $trossosDiferentes = array("[", '"', "]");
        $stringAtributos = strtolower($_POST['categoriaAtributos']);
        $strSemAsCoisasDiferentes = str_replace($trossosDiferentes, "", $stringAtributos);
        return $arrayAtributos = explode(',', $strSemAsCoisasDiferentes);
    }

    private function cadastrar()
    {
        $this->categoria->setNome($_POST['categoriaNome']);
        $this->categoria->setAtributos($this->transformaCampoEmArray());
        $this->categoria->setTipoAtributos($_POST['tipo']);
        echo ($this->categoria->cadastrarCategoria()) ? "<script>alert('Cadastro de categoria efetuado com sucesso!')</script> "
            : "<script>alert('Cadastro de categoria não efetuado!')</script>";
        echo "<script>window.location.replace('../view/frmCadastroCategoria.php');</script>";
    }

    private function alterar()
    {


        $this->categoria->setId($_POST['id1']);
        $this->categoria->setNome($_POST['categoriaNome1']);
        $this->categoria->setTipoAtributos($_POST['tipo']);
        $this->categoria->setAtributos($this->transformaCampoEmArray());
        echo ($this->categoria->alterarCategoria()) ? "<script>alert('Alteração de categoria efetuada com sucesso!')</script> "
            : "<script>alert('Alteração de categoria não efetuada!')</script>";
//        echo "<script>window.location.replace('CategoriaController.php?q=listar');</script>";


    }


    private
    function listar()
    {
        $this->categoria->listarCategoria();
    }

    private
    function excluir()
    {
        echo $this->categoria->excluirCategoria($_GET['id']);
        echo "<script>window.location.replace('CategoriaController.php');</script>";
    }

    public
    function consultaCategorias()
    {
        $this->categoria->consultarCategoria();
    }

    public function puxarCategoriaJaCadastrada($id)
    {
        return $this->categoria->puxarCategoriaJaCadastrada($id);
    }

    public function consultarAtributosCategoriaPeloIdDaCategoria($id_categoria)
    {
        echo $this->categoria->consultarAtributosCategoriaPeloIdDaCategoria($id_categoria);
    }

    public function consultarAtributosCategoriaPeloIdDaCategoriaParaOAngular($id_categoria)
    {
        echo $this->categoria->consultarAtributosCategoriaPeloIdDaCategoriaParaOAngular($id_categoria);
    }

    public function retornaTipoDoAtributo($id_categoria)
    {
        return $this->categoria->retornaTipoAtributo($id_categoria);
    }

    public function retornaNomeAtributo($id_categoria)
    {
        return $this->categoria->retornaNomeAtributo($id_categoria);
    }

    public function retornaNumeroDeCategoriasCadastradas()
    {
        return $this->categoria->retornaNumRegistros("categoria", "ativado=1");
    }
}

new CategoriaController();