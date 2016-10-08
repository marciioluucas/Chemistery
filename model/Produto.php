<?php
require_once("Banco.php");
require_once("Secao.php");
require_once("Categoria.php");

/**
 * Created by PhpStorm.
 * User: Márcio Lucas
 * Date: 10/03/2016
 * Time: 08:28
 */
class Produto extends Banco
{
    private $id;
    private $nome;
    private $descricao;
    private $imagem;
    private $preco;
    private $usuarioLogadoId;
    private $imagemPrincipal;
    private $mostraPreco;
    private $secao;
    private $categoria;

    /**
     * Produto constructor.
     * @param $secao
     */


    function getPreco()
    {
        return $this->preco;
    }

    function setPreco($preco)
    {
        $this->preco = $preco;
    }

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
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
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
    public function getImagem()
    {
        return $this->imagem;
    }

    /**
     * @param mixed $imagem
     */
    public function setImagem($imagem)
    {
        $this->imagem = $imagem;
    }

    /**
     * @return mixed
     */
    public function getUsuarioLogadoId()
    {
        return $this->usuarioLogadoId;
    }

    /**
     * @param mixed $usuarioLogadoId
     */
    public function setUsuarioLogadoId($usuarioLogadoId)
    {
        $this->usuarioLogadoId = $usuarioLogadoId;
    }


    /**
     * @return mixed
     */
    public function getImagemPrincipal()
    {
        return $this->imagemPrincipal;
    }

    /**
     * @param mixed $imagemPrincipal
     */
    public function setImagemPrincipal($imagemPrincipal)
    {
        $this->imagemPrincipal = $imagemPrincipal;
    }

    /**
     * @return mixed
     */
    public function getMostraPreco()
    {
        return $this->mostraPreco;
    }

    /**
     * @param mixed $mostraPreco
     */
    public function setMostraPreco($mostraPreco)
    {
        $this->mostraPreco = $mostraPreco;
    }

    /**
     * @return Secao
     */
    public function getSecao()
    {
        return $this->secao;
    }

    /**
     * @param Secao $secao
     */
    public function setSecao($secao)
    {
        $this->secao = $secao;
    }

    /**
     * @return Categoria
     */
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * @param Categoria $categoria
     */
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;
    }


    function cadastrarProduto()
    {
        try {
            $this->tabela = "produto";
            $this->campos = array("nome", "descricao", "preco", "imagem", "usuario_id", "imagemprincipal",
                "mostrapreco", "categoria_id", "secao_id", "datacriacao");
            $this->valores = array($this->getNome(), $this->getDescricao(), $this->getPreco(), $this->getImagem(),
                $this->usuarioLogadoId, $this->imagemPrincipal, $this->mostraPreco, $this->categoria, $this->secao, date("Y-m-d"));
            return $this->cadastrar();
        } catch (Exception $e) {
            echo "Exceção capturada: " . $e->getMessage();
            return null;
        }

    }

    function alterarProduto()
    {
        $campos_eq_valores = "nome = '$this->nome', ";
        $campos_eq_valores .= "descricao = '$this->descricao', ";
        $campos_eq_valores .= "preco = '$this->preco', ";
        if ($this->imagem != "") {

        }
        if ($this->imagemPrincipal != "") {
            $campos_eq_valores .= "imagemprincipal = '$this->imagemPrincipal', ";
        }
        $campos_eq_valores .= "mostrapreco = '$this->mostraPreco', ";
        $campos_eq_valores .= "secao_id = '$this->secao', categoria_id = '$this->categoria', dataultimaalteracao = '" . date("Y-m-d") . "'";

        try {
            return $this->alterar("produto", $campos_eq_valores, $this->id);
        } catch (Exception $e) {
            return "Exceção capturada: " . $e->getMessage();

        }
    }

    function excluirProduto($id)
    {
        try {
            return $this->delete("produto", "ativado = 0, dataexcusao=" . date('Y-m-d'), "id=$id");
        } catch (Exception $e) {
            echo "Exceção capturada: " . $e->getMessage();
            return null;
        }
    }

    function listarProduto()
    {
        $this->tabela = "produto";
        $this->campos = array("id", "nome", "preco", "mostrapreco", "imagem", "descricao", "categoria_id", "secao_id");
        $this->condicao = "ativado = 1 ";
        $this->subQntColunasConsulTabela = 5;
        $this->listar();
    }

    function numProdutosCadastrados()
    {
        echo $this->retornaNumRegistros("produtos", "ativado = 1");
    }


    function pesquisarProduto()
    {

    }

    function listarProdutoPrincipal($pagina)
    {
        $limite = 8;
        $offset = $pagina * $limite;
        $this->tabela = "produto";
        $this->condicao = "ativado = 1";
        $sql = "SELECT * FROM $this->tabela where ativado=1 ORDER BY id ASC";

        $query = $this->query($sql);
        $resul = mysqli_num_rows($query);


        $sql .= " LIMIT $limite OFFSET $offset";
        $this->query = $this->query($sql);
//        echo "Offset: " . $offset . "\n";
//        echo "Limite: " . $limite . "\n";
        if (!$this->query) {
            echo "Erro na query SQL";
            die();
        }


        if (mysqli_num_rows($this->query) > 0) {

            echo "<html>
   <head>
   <!-- Bootstrap 3.3.5 -->
    <link rel=\"stylesheet\" href=\"../bootstrap/css/bootstrap.min.css\">
    <!-- Font Awesome -->
    <link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css\">
    <!-- Ionicons -->
    <link rel=\"stylesheet\" href=\"https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css\">
    <!-- Theme style -->
    <link rel=\"stylesheet\" href=\"../dist/css/AdminLTE.min.css\">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel=\"stylesheet\" href=\"../dist/css/skins/_all-skins.min.css\">
    <!-- iCheck -->
    <link rel=\"stylesheet\" href=\"../plugins/iCheck/flat/blue.css\">
    <!-- Morris chart -->
    <link rel=\"stylesheet\" href=\"../plugins/morris/morris.css\">
    <!-- jvectormap -->
    <link rel=\"stylesheet\" href=\"../plugins/jvectormap/jquery-jvectormap-1.2.2.css\">
    <!-- Date Picker -->
    <link rel=\"stylesheet\" href=\"../plugins/datepicker/datepicker3.css\">
    <!-- Daterange picker -->
    <link rel=\"stylesheet\" href=\"../plugins/daterangepicker/daterangepicker-bs3.css\">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel=\"stylesheet\" href=\"../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css\">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src=\"https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js\"></script>
    <script src=\"https://oss.maxcdn.com/respond/1.4.2/respond.min.js\"></script>
    <![endif]-->
    <style>

        img {
            max-width: 100%;
            /*padding: 10px;*/
            /*border: 1px solid #ccc;*/
            background: #fff;
            /*box-shadow: 1px 1px 7px rgba(0, 0, 0, 0.1);*/
            height: auto;
            width: auto;
            max-height: 170px;

            /*width: 374px;*/
            /*height: 367px;*/
        }

        h1 {
            font-size: 3em;
            line-height: 1;
            margin-bottom: 0.5em;
        }

        p {
            margin-bottom: 1.5em;
        }

        .thumbnails {
            width: 380px;
            height: 70px;
            list-style: none;
            margin-bottom: 1.5em;
        }

        .main-image {
           
            margin-bottom: 0.75em;
        }

        .thumbnails li {
            display: inline;
            margin: 0 10px 0 0;
        }
        .thumbnails img {
            width: 70px;
            height: 70px;
        }

        .pag2 {

            width: 380px;
            height: 70px;
            list-style: none;
            display: none;

        }

        .pag1 {
            width: 380px;
            height: 70px;

            list-style: none;

        }

        .previous {
            height: 70px;;
        }

        .next {
            height: 70px;
        }
        
        a {
        color: #232527;
        }
        
        a:hover {
        color: #37393b;
        }
       

        .divcontainer {
            height: 190px;
            width: 220px;
            display: flex;
            display: -webkit-flex; /* Garante compatibilidade com navegador Safari. */
            text-align: center;
            justify-content: center;
            align-items: center;
            border: 1px solid #CDCDCD;
            padding: 10px;
//            margin-left: 20px;
            box-shadow: 1px 1px 7px rgba(0, 0, 0, 0.1);
        }

        .img {
            margin-top: 10px;
            margin-bottom: 10px;

        }

    </style>
</head>
<body>
<div class=\"\">

    <div class=\"row\" style='margin-bottom: 150px;'>";
            while ($r = mysqli_fetch_array($this->query, MYSQLI_ASSOC)) {
                $imagensString = strtolower($r['imagem']);
                $imagens = explode('-', $imagensString);
                echo
                "
    
        <div class=\"col-sm-3\">";

                echo
                    "
        <table style='width:100% !important;'>
            <tr>
                <td>
                    <div class=\"main-image divcontainer\">
                    <a href='../view/produto.php?id=" . $r['id'] . "'>
                    <img src='" . $r['imagemprincipal'] . "'  alt=\"Placeholder\" class=\"custom img\"></a>
</div>
</td>
</tr>
<tr style='height: 150px; vertical-align: baseline;'>
    <td>
        <div>
            <h4 style=\"width: 150px !important\"><a href='../view/produto.php?id=" . $r['id'] . "'>" . $r['nome'] . "</a></h4>

        </div>
    </td>
</tr>
</table>
</div>

";


            }

            echo "
<footer style='bottom: 0 !important; position: absolute !important; width: 100%'>
<div class='col-sm-12' style='bottom: 0'>
    <nav>
        <ul class=\"pager\">

            ";
            $pa = $resul / $limite;

            $paTotal = (int)$pa;

            if ($pagina > 0 && $pagina < $paTotal) {

                echo "
            <li class=\"previous\"><a href=\"../controller/ProdutoController.php?d=listagem&pagina=" . ($pagina - 1) . "\"><span
                    aria-hidden=\"true\">&larr;</span> Anterior</a></li>
            <li class=\"next\"><a href=\"../controller/ProdutoController.php?d=listagem&pagina=" . ($pagina + 1) . "\">Próximo <span
                    aria-hidden=\"true\">&rarr;</span></a></li>
            ";

            }
            if ($pagina == 0 && $pagina != $paTotal) {

                echo "
            <li class=\"previous disabled\"
            ><a href=\"#\"><span aria-hidden=\"true\">&larr;</span> Anterior</a></li>
            <li class=\"next\"><a href=\"../controller/ProdutoController.php?d=listagem&pagina=" . ($pagina + 1) . "\">Próximo <span
                    aria-hidden=\"true\">&rarr;</span></a></li>
            " .
                    "";
            }

            echo "Página " . ($pagina + 1) . " de " . ($paTotal + 1);
            if (($pagina) == $paTotal && $pagina != 0) {
                echo "
            <li class=\"previous\"><a href=\"../controller/ProdutoController.php?d=listagem&pagina=" . ($pagina - 1) . "\"><span
                    aria-hidden=\"true\">&larr;</span> Anterior</a></li>
            <li class=\"next disabled\"><a href=\"#\">Próximo <span aria-hidden=\"true\">&rarr;</span></a></li>";
            }

            if ($pagina == $paTotal && $pagina == 0) {
                echo "
            <li class=\"previous disabled\"><a href=\"#\"><span
                aria-hidden=\"true\">&larr;</span> Anterior</a></li>
            <li class=\"next disabled\"><a href=\"#\">Próximo <span aria-hidden=\"true\">&rarr;</span></a></li>";
            }

            echo "
        </ul>
    </nav>
</div>
</footer>
</div>
</div>";

            echo "</body>
</html>";
        } else {
            echo "Nenhum produto cadastrado";
        }
    }


    function gerarFormularioAtributos($id_categoria, $id_produto)
    {

        if ($id_produto != "") {

            $numRegistros = $this->retornaNumRegistros("valor_atributo", "produto_id = '" . $id_produto . "' and atributo_categoria_id = $id_categoria");
            if ($numRegistros > 0) {

                $sql = "select * from atributo inner join valor_atributo on categoria_id = $id_categoria and atributo.id = atributo_id and produto_id = $id_produto where ativado = 1";
                $this->query = $this->query($sql);


//echo $sql;
            } else {
                $sql = "SELECT * FROM atributo WHERE categoria_id = " . $id_categoria . " AND ativado = 1";
                $this->query = $this->query($sql);
//                echo $sql;
            }

        } else {
            $sql = "SELECT * FROM atributo WHERE categoria_id = " . $id_categoria . " AND ativado = 1";
//            echo $sql;
            $this->query = $this->query($sql);
        }

        while ($r = mysqli_fetch_array($this->query, MYSQLI_ASSOC)) {

            if ($id_categoria != null || $id_categoria != "") {

                echo "<div class=\"form-group col-lg-12\">
                    <label for=\"atributo-" . str_replace(" ", "-", ucfirst($r['nome'])) . "\">" . ucfirst($r['nome']) . "</label>
                    <input type=\"text\" class=\"form-control atributo-" . $r['tipo'] . "\" id=\"atributo-" . str_replace(" ", "-", ucfirst($r['nome'])) . "\" name=\"produtoAtributos[]\" required
                   
                           placeholder=\"Coloque aqui o " . ucfirst($r['nome']) . "\"";
                if (isset($r['valor'])) {
                    if (($r['valor'] != null or $r['valor'] != "") and $r['produto_id'] == $id_produto) {
                        echo "value='" . $r['valor'] . "'";
                    }
                }
                echo "> 
                </div>";


            } else {
                echo "";
            }


        }

//        if ($id_produto != "") {
//            $sql2 = "select categoria_id from produto where id = $id_produto";
//            if (!$this->query($sql2)) {
//                die("Query errada");
//            }
//            $r2 = mysqli_fetch_array($this->query($sql2), MYSQLI_ASSOC);
//            if ($numRegistros > 0) {
//                if ($id_categoria == $r2['categoria_id']) {
//                    $sql = "select * from atributo inner join valor_atributo on categoria_id = $id_categoria and atributo.id = atributo_id and produto_id = $id_produto";
//                }
//            }
//        } else {
//        }

        $script = "<script>$(\".atributo-data\").inputmask(\"dd/mm/yyyy\", {\"placeholder\": \"dd/mm/yyyy\"});</script>";


        $script .= "<script>$(\".atributo-numero\").inputmask(\"(99) 9999-9999\", {\"placeholder\": \"(xx) xxxx-xxxx\"});</script>";

        $script .= "<script>$(\".atributo-dinheiro\").maskMoney({prefix:'R$ ', allowNegative: true, thousands:'.', decimal:',', affixesStay: false});</script>";


        echo $script;


    }

    function inserirValorDosAtributos($produto_id, $categoria_id, $valor)
    {
//        $arrayValor = explode(", ", $valor);
        $sql = "select * from atributo where categoria_id = '$categoria_id' and ativado = 1";
        $query = $this->query($sql);
        $i = 0;
        while ($r = mysqli_fetch_array($query, MYSQLI_ASSOC)) {

            $sql = "insert into valor_atributo (valor, produto_id, atributo_id, atributo_categoria_id) VALUES ('$valor[$i]', '$produto_id', '" . $r['id'] . "', '$categoria_id')";

            $this->query($sql);
            $i++;
        }
    }

    function alterarValorDosAtributos($produto_id, $categoria_id, $valor)
    {

        $sql = "select * from atributo inner join valor_atributo on atributo.id = atributo_id and categoria_id = '$categoria_id' and valor_atributo.produto_id = $produto_id and ativado = 1";
//        echo $sql;
        $query = $this->query($sql);
        $i = 0;
//        $sqlDelete = "delete from valor_atributo WHERE produto_id = $produto_id and valor != '$valor[$i]'";
//        $this->query($sqlDelete);
        $numAtributosJoinValoresAtributos = $this->retornaNumRegistros("atributo inner join valor_atributo on atributo.id = atributo_id and categoria_id = '$categoria_id' and valor_atributo.produto_id = $produto_id and ativado = 1", "1=1");
//        echo $numAtributosJoinValoresAtributos;
        if ($numAtributosJoinValoresAtributos > 0) {
            while ($r = mysqli_fetch_array($query, MYSQLI_ASSOC)) {

//                echo $r['valor'] . " = " . $valor[$i] . " ";
                $numRegistrosValoresAtributos = $this->retornaNumRegistros("valor_atributo", "produto_id = '$produto_id' and atributo_categoria_id = '$categoria_id'");
//            echo $numRegistrosValoresAtributos;
                if ($numRegistrosValoresAtributos == 0) {
                    $sql = "insert into valor_atributo (valor, atributo_id, produto_id, atributo_categoria_id) values ('$valor[$i]', '" . $r['id'] . "', '$produto_id', '$categoria_id')";
                    echo "<br>$sql<br>";
                    $this->query($sql);

                } else {
                    if ($valor[$i] != $r['valor']) {
//echo "deu " . $valor[$i] . " ";
                        $sql = "UPDATE valor_atributo SET valor='" . $valor[$i] . "' WHERE id = '" . $r['id'] . "'";
                        $this->query($sql);
//                    echo $sql2 . "    <br>";
                    }
//                echo $r['id'] . " <br>";

                }
                $i++;
            }
        } else {
            $i = 0;
            $sql = "select * from atributo where ativado = 1 and categoria_id = '$categoria_id'";
            echo $sql;
            $query = $this->query($sql);
            while ($r = mysqli_fetch_array($query, MYSQLI_ASSOC)) {

//                 echo $r['valor'] . " = " . $valor[$i] . " ";
                $numRegistrosValoresAtributos = $this->retornaNumRegistros("valor_atributo", "produto_id = '$produto_id' and atributo_categoria_id = '$categoria_id'");

                $sql = "insert into valor_atributo (valor, atributo_id, produto_id, atributo_categoria_id) values ('$valor[$i]', '" . $r['id'] . "', '$produto_id', '$categoria_id')";
                echo "<br>$sql<br>";
                $this->query($sql);


                $i++;
            }
        }
    }

    function retornaOIdDoUltimoProdutoCadastrado()
    {
        $querySelectultimoProdutoCadastrado = $this->query("SELECT max(id) AS ultimoId FROM produto");
        $r = mysqli_fetch_array($querySelectultimoProdutoCadastrado, MYSQLI_ASSOC);
        return $r['ultimoId'];

    }

    function retornaAtributosDosProdutos($produto_id, $categoria_id)
    {
        $sql = "SELECT * FROM atributo INNER JOIN valor_atributo ON atributo.id = atributo_id WHERE produto_id = " .
            $produto_id . " AND categoria_id = " . $categoria_id . ";";
        $query = $this->query($sql);
        while ($r = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
            echo "<tr>
                    <td style='width: 50%; background-color: #f3f3f3;'><h4>" . ucfirst($r['nome']) . ":</h4></td>
                    <td style='background-color: #fafafa'><h4>" . strtoupper($r['valor']) . "</h4></td>
                </tr>";
        }
    }

    function retornaNomeProduto($produto_id, $categoria_id)
    {
        $sql = "SELECT * FROM produto WHERE id = " .
            $produto_id . " AND categoria_id = " . $categoria_id . ";";
        $query = $this->query($sql);
        while ($r = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
            echo "<tr>
                    <td style='width: 50%; background-color: #f3f3f3;'><h4>" . ucfirst($r['nome']) . ":</h4></td>
                    <td style='background-color: #fafafa'><h4>" . strtoupper($r['valor']) . "</h4></td>
                </tr>";
        }
    }

    function retornaAlgoProduto($campo_sql, $id_produto)
    {
        $sql = "select * from produto where ativado = 1 and id = $id_produto";
        $query = $this->query($sql);
        $r = mysqli_fetch_array($query, MYSQLI_ASSOC);
        return $r[$campo_sql];
    }

    function dadosGraficoProdutosCadastradosUltimos30Dias()
    {


        $sql = "SELECT DAY(datacriacao) AS dia FROM produto WHERE ativado=1 AND datacriacao >= CURDATE() - INTERVAL 30 DAY AND CURDATE();";
        $query = $this->query($sql);
        if ($this->retornaNumRegistrosDigitandoSQL($sql) == 0) {
            echo "{day: '0', valor: 0},";
        }
        while ($r = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
            $sql2 = "SELECT DAY(datacriacao) AS dia FROM produto WHERE ativado=1 AND datacriacao >= CURDATE() - INTERVAL 30 DAY AND CURDATE() AND DAY(datacriacao) = " . $r['dia'] . ";";
            $valor = $this->retornaNumRegistrosDigitandoSQL($sql2);
            echo "{day: 'Dia " . $r['dia'] . "', valor: $valor},";
        }

    }

    function dadosGraficoCategoriasCadastradasUltimos30Dias()
    {
        $sql = "SELECT DAY(datacriacao) AS dia FROM categoria WHERE ativado=1 AND datacriacao >= CURDATE() - INTERVAL 30 DAY AND CURDATE();";
        $query = $this->query($sql);
        if ($this->retornaNumRegistrosDigitandoSQL($sql) == 0) {
            echo "{day: '0', valor: 0},";
        }
        while ($r = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
            $sql2 = "SELECT DAY(datacriacao) AS dia FROM categoria WHERE ativado=1 AND datacriacao >= CURDATE() - INTERVAL 30 DAY AND CURDATE() AND DAY(datacriacao) = " . $r['dia'] . ";";
            $valor = $this->retornaNumRegistrosDigitandoSQL($sql2);
            echo "{day: 'Dia " . $r['dia'] . "', valor: $valor},";
        }
    }

    function dadosGraficoSecoesCadastradasUltimos30Dias()
    {
        $sql = "SELECT DAY(datacriacao) AS dia FROM secao WHERE ativado=1 AND datacriacao >= CURDATE() - INTERVAL 30 DAY AND CURDATE();";
        $query = $this->query($sql);
        if ($this->retornaNumRegistrosDigitandoSQL($sql) == 0) {
            echo "{day: '0', valor: 0},";
        }
        while ($r = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
            $sql2 = "SELECT DAY(datacriacao) AS dia FROM secao WHERE ativado=1 AND datacriacao >= CURDATE() - INTERVAL 30 DAY AND CURDATE() AND DAY(datacriacao) = " . $r['dia'] . ";";
            $valor = $this->retornaNumRegistrosDigitandoSQL($sql2);
            echo "{day: 'Dia " . $r['dia'] . "', valor: $valor},";
        }
    }

    function alterarStringArray($separador, $string, $posicao)
    {
        $string = explode($separador, $string);
        unset($string[$posicao]);

        $string = implode($separador, $string);
        return $string;
    }

    function cadastrarImagemNoProdutoJaCadastrado($caminhoImagem, $posicaoImagem, $idProduto)
    {
        $sql = "";
        $sql1 = "SELECT * FROM imagem WHERE produto_id = " . $idProduto . " AND posicao = " . $posicaoImagem;
        $query = $this->query($sql1);

        while ($r = mysqli_fetch_array($query, MYSQLI_ASSOC)) {

            $sql2 = "DELETE FROM imagem WHERE idimagem = " . $r['idimagem'];
            $this->query($sql2);
        }

        $sql .= "INSERT INTO imagem (caminho, produto_id, posicao) VALUES ('" . $caminhoImagem . "'," . $idProduto . ", " . $posicaoImagem . "); ";
        $this->query($sql);

    }

    function consultarImagensNoProduto($idProduto, $posicaoImagem)
    {
        $sql = "SELECT * FROM IMAGEM WHERE produto_id=" . $idProduto . " AND posicao = " . $posicaoImagem;
        $query = $this->query($sql);
        $r = mysqli_fetch_array($query, MYSQLI_ASSOC);
        if ($r['caminho'] != null || $r['caminho'] != "") {
            return $r['caminho'];

        } else {
            return "../imagens/noimg.png";
        }
    }

    function consultarNumeroImagensNoProduto($idProduto)
    {
    
        $sql = "SELECT * FROM IMAGEM WHERE produto_id=" . $idProduto;
        
        $query = $this->query($sql);
        
        return mysqli_num_rows($query);
        
    }

    function listarImagensProduto($idProduto, $qntImagens)
    {
        $sql = "SELECT * FROM IMAGEM WHERE produto_id=" . $idProduto;
        
        $query = $this->query($sql);
        $i = 0;
        $retorno = "a";
        while ($r = mysqli_fetch_array($query, MYSQLI_ASSOC)) {

            if ($i != $qntImagens - 1) {

                $retorno .= $r['caminho'] . "-";
            } else {
                $retorno .= $r['caminho'];
            }
            $i++;
        }
        return $retorno;
    }

    function excluirImagemSecundaria($idProduto, $posicao) {
        $sql = "delete from imagem where produto_id = $idProduto and posicao = $posicao";
        echo $sql;
        if($this->query($sql)){
            return true;
        }else{
            return false;
        }
    }

    function excluirImagemPrincipal($idProduto){
        $sql = "update produto set imagem = '' where id = $idProduto";
        if($this->query($sql)){
           return true;
        }else{
            return false;
        }
    }
}
