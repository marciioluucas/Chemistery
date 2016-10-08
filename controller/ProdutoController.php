<?php

require_once("../model/Produto.php");
require_once("../model/Imagem.php");
require_once("../model/Categoria.php");
require_once("../model/Secao.php");

/**
 * Created by PhpStorm.
 * User: Carlos Eduardo
 * Date: 10/03/2016
 * Time: 08:28
 */
class ProdutoController
{

    private $produto;
    private $imagem;
    private $categoria;
    private $secao;
    public $row;

    /**
     * @return mixed
     */


    /**
     * produtoController constructor.
     */
    public function __construct()
    {
        $this->produto = new Produto();
        $this->imagem = new Imagem();
        $this->categoria = new Categoria();
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
        if (isset($_GET['d']) == "listagem") {
            $this->listagemPrincipal();
        }
        if (isset($_GET['ac']) == "excluirImg") {
            if (isset($_GET['posicao'])) {

                $this->excluirImagemSecundaria($_GET['produtoId'], $_GET['posicao']);
            } else {
                $this->excluirImgPrincipal($_GET['produtoId']);
            }

        }


        if (isset($_GET['produto'])) {

        }

        if (isset($_GET['produtoCategoria2']) && $_GET['produtoCategoria2'] != "Nenhuma") {

            if (isset($_GET['id1'])) {
                $id1 = $_GET['id1'];
            } else {
                $id1 = "";
            }
            $this->carregaFormularioAtributosAdicionais($_GET['produtoCategoria2'], $id1);
        }

    }

    private function cadastrar()
    {

        $this->produto->setNome($_POST['produtoNome']);
        $this->produto->setDescricao($_POST['produtoDescricao']);
        $this->produto->setPreco($_POST['produtoPreco']);
        $this->produto->setUsuarioLogadoId($_POST['idUsuarioLogado']);
        $this->produto->setCategoria($_POST['produtoCategoria2']);
        $this->produto->setSecao($_POST['produtoSecao']);
        if (isset($_POST['produtoPrecoOnOff'])) {
            $this->produto->setMostraPreco(1);
        } else {
            $this->produto->setMostraPreco(0);
        }
        $setImg = "";
        $qntImagens = count($_FILES['produtoImagem']['name']);
        for ($i = 0; $i < $qntImagens; $i++) {
            $this->imagem->setArquivoNome($_FILES['produtoImagem']['name'][$i]);
            $this->imagem->setArquivoErro($_FILES['produtoImagem']['error'][$i]);
            $this->imagem->setArquivoTemporarioNome($_FILES['produtoImagem']['tmp_name'][$i]);
            $this->imagem->setArquivoExtensao($_FILES['produtoImagem']['type'][$i]);
            if ($i < $qntImagens - 1) {
                $setImg .= $this->imagem->uploadMultiplo() . "-";
            } else {
                $setImg .= $this->imagem->uploadMultiplo();
            }
        }
        $this->produto->setImagem($setImg);

        $this->imagem->setArquivoNome($_FILES['produtoImagemPrincipal']['name']);
        $this->imagem->setArquivoErro($_FILES['produtoImagemPrincipal']['error']);
        $this->imagem->setArquivoTemporarioNome($_FILES['produtoImagemPrincipal']['tmp_name']);
        $this->imagem->setArquivoExtensao($_FILES['produtoImagemPrincipal']['type']);
        if (isset($_FILES['produtoImagemPrincipal']['name'])) {

            $this->produto->setImagemPrincipal($this->imagem->upload());
        } else {
            $this->produto->setImagemPrincipal(null);
        }


        echo ($this->produto->cadastrarProduto()) ? "<script>alert('Cadastro de produto efetuado com sucesso!')</script> "
            : "<script>alert('Cadastro de produto com erro!')</script>";

        $ultimoProdutoCadastrado = $this->produto->retornaOIdDoUltimoProdutoCadastrado();
//        $stringValorProdutos = implode(", ", $_POST['produtoAtributos']);
//        echo $_POST['produtoCategoria2'];
        $this->produto->inserirValorDosAtributos($ultimoProdutoCadastrado, $_POST['produtoCategoria2'], $_POST['produtoAtributos']);

        echo "<script>window.location.replace('../view/frmCadastroProduto.php');</script>";
    }

    private function alterar()
    {
        if (isset($_POST['id1'])) $this->produto->setId($_POST['id1']);
        if (isset($_POST['produtoNome1']) || $_POST['produtoNome1'] != "") $this->produto->setNome($_POST['produtoNome1']);
        if (isset($_POST['produtoDescricao1'])) $this->produto->setDescricao($_POST['produtoDescricao1']);
        if (isset($_POST['produtoPreco1'])) $this->produto->setPreco($_POST['produtoPreco1']);
        $this->produto->setCategoria($_POST['produtoCategoria1']);
        $this->produto->setSecao($_POST['produtoSecao1']);
        if (isset($_POST['produtoPrecoOnOff1'])) {
            $this->produto->setMostraPreco(1);
        } else {
            $this->produto->setMostraPreco(0);
        }
        $setImg = "";

//          Imagens secundárias sem upload


        for ($i = 0; $i < 9; $i++) {
            if (($_FILES['produtoImagem1']['name'][$i] == "") && $_POST['angImg'][$i] != 0) {
                $this->imagem->setCaminho($this->retornaImagensDoProduto($i));
                $this->imagem->setAnguloDeRotacao($_POST['angImg'][$i]);
                echo $_POST['angImg'][$i];
                $this->imagem->rotacaoImagemSemUpload();
            }
        }

// Imagens secundárias
        $qntImagens = 0;
        for ($l = 0; $l < 9; $l++) {
            if ($_FILES['produtoImagem1']['name'][$l] != "") {
//                echo $_FILES['produtoImagem1']['name'][$l] . " ";
                $qntImagens++;
            }
        }

        for ($i = 0; $i < 9; $i++) {
            if ($_FILES['produtoImagem1']['name'][$i] != "") {
                $this->imagem->setArquivoNome($_FILES['produtoImagem1']['name'][$i]);
                $this->imagem->setArquivoErro($_FILES['produtoImagem1']['error'][$i]);
                $this->imagem->setArquivoTemporarioNome($_FILES['produtoImagem1']['tmp_name'][$i]);
                $this->imagem->setArquivoExtensao($_FILES['produtoImagem1']['type'][$i]);
                $this->imagem->setAnguloDeRotacao($_POST['angImg'][$i]);
                $this->produto->cadastrarImagemNoProdutoJaCadastrado($this->imagem->upload(), $i, $_POST['id1']);
            }

        }


//        Imagem principal

        if (!isset($_FILES['produtoImagemPrincipal1']['name']) || $_POST['angImgPrincipal'] != 0) {

            $imagemCadastrada = $this->retornaAlgoDoProdutoQueEuQueira("imagemprincipal", $_POST['id1']);
            $this->imagem->setCaminho($imagemCadastrada);
            $this->imagem->setAnguloDeRotacao($_POST['angImgPrincipal']);
            $this->imagem->rotacaoImagemSemUpload();
        }

        if ($_FILES['produtoImagemPrincipal1']['name'] != "") {
            $this->imagem->setArquivoNome($_FILES['produtoImagemPrincipal1']['name']);
            $this->imagem->setArquivoErro($_FILES['produtoImagemPrincipal1']['error']);
            $this->imagem->setArquivoTemporarioNome($_FILES['produtoImagemPrincipal1']['tmp_name']);
            $this->imagem->setArquivoExtensao($_FILES['produtoImagemPrincipal1']['type']);
            $this->imagem->setAnguloDeRotacao($_POST['angImgPrincipal']);
            $this->produto->setImagemPrincipal($this->imagem->upload());
        }
        $this->produto->alterarProduto();


        if (isset($_POST['produtoAtributos'])) $this->produto->alterarValorDosAtributos($_POST['id1'], $_POST['produtoCategoria1'], $_POST['produtoAtributos']);
//        echo ($this->produto->alterarProduto()) ? "<script>alert('Alteração do produto efetuada com sucesso!'); window.location.replace('ProdutoController.php?q=listar');</script>"
//            : "<script>alert('Erro na alteração do produto!'); window.location.replace('ProdutoController.php?q=listar');</script>";

    }

    private function listar()
    {
        $this->produto->listarProduto();
    }

    private function excluir()
    {
        $this->produto->excluirProduto($_GET['id']);
        echo "<script>window.location.replace('ProdutoController.php?q=listar')</script>";
    }

    public function listagemPrincipal()
    {
        if (isset($_GET['pagina']) && (int)$_GET['pagina'] >= 0) {
            $pagina = (int)$_GET['pagina'];
        } else {
            $pagina = 0;
        }
        $this->produto->listarProdutoPrincipal($pagina);
    }

    public function mostraPaginaProduto()
    {

    }

    public function retornaNumProdutos()
    {
        return $this->produto->retornaNumRegistros("produto", "ativado=1");
    }

    public function carregaFormularioAtributosAdicionais($id_categoria, $id_produto)
    {
        $this->produto->gerarFormularioAtributos($id_categoria, $id_produto);
    }

    public function retornaAtributoDosProdutos($id_produto, $id_categoria)
    {
        $this->produto->retornaAtributosDosProdutos($id_produto, $id_categoria);
    }

    public function retornaAlgoDoProdutoQueEuQueira($campo_sql, $id_produto)
    {
        return $this->produto->retornaAlgoProduto($campo_sql, $id_produto);
    }

    public function retornaUltimosProdutosCadastradosParaOGraficoDashboard()
    {
        return $this->produto->dadosGraficoProdutosCadastradosUltimos30Dias();
    }

    public function retornaUltimosCategoriasCadastradasParaOGraficoDashboard()
    {
        return $this->produto->dadosGraficoCategoriasCadastradasUltimos30Dias();
    }

    public function retornaUltimosSecoesCadastradasParaOGraficoDashboard()
    {
        return $this->produto->dadosGraficoSecoesCadastradasUltimos30Dias();
    }

    public function alterarStringArrayImagens($string, $posicao)
    {
        return $this->produto->alterarStringArray("-", $string, $posicao);
    }

    public function retornaImagensDoProduto($posicaoImg)
    {
        if (isset($_GET['id'])) {

            return $this->produto->consultarImagensNoProduto($_GET['id'], $posicaoImg);
        }
        if (isset($_POST['id1'])) {
            return $this->produto->consultarImagensNoProduto($_POST['id1'], $posicaoImg);
        }

        return false;
    }

    public function retornaNumeroDeImagensNoProduto($idProduto)
    {
        return $this->produto->consultarNumeroImagensNoProduto($idProduto);
    }

    public function listaImagensProduto($idProduto, $qntImagens)
    {
        return $this->produto->listarImagensProduto($idProduto, $qntImagens);
    }

    public function excluirImagemSecundaria($idProduto, $posicaoImg)
    {
        return $this->produto->excluirImagemSecundaria($idProduto, $posicaoImg);
    }

    public function excluirImgPrincipal($idProduto)
    {
        return $this->produto->excluirImagemPrincipal($idProduto);
    }

}


new produtoController();
