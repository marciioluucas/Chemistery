<?php
require_once "Banco.php";

/**
 * Created by PhpStorm.
 * User: Marcio Lucas
 * Date: 18/04/2016
 * Time: 10:42
 */
class Categoria extends Banco
{
    private $id;
    private $nome;
    private $data;
    private $atributos;
    private $tipoAtributos;
    private $categoriaAnterior;
    private $atributosAnteriores;
    private $tipoAtributosAnteriores;

    /**
     * Categoria constructor.
     * @param $data
     */
    public function __construct()
    {
        parent::__construct();
        $this->data = date("Y-m-d");
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
    public function getAtributos()
    {
        return $this->atributos;
    }

    /**
     * @param mixed $atributos
     */
    public function setAtributos($atributos)
    {
        $this->atributos = $atributos;
    }

    /**
     * @return mixed
     */
    public function getTipoAtributos()
    {
        return $this->tipoAtributos;
    }

    /**
     * @param mixed $tipoAtributos
     */
    public function setTipoAtributos($tipoAtributos)
    {
        $this->tipoAtributos = $tipoAtributos;
    }

    /**
     * @return mixed
     */
    public function getCategoriaAnterior()
    {
        return $this->categoriaAnterior;
    }

    /**
     * @param mixed $categoriaAnterior
     */
    public function setCategoriaAnterior($categoriaAnterior)
    {
        $this->categoriaAnterior = $categoriaAnterior;
    }

    /**
     * @return mixed
     */
    public function getAtributosAnteriores()
    {
        return $this->atributosAnteriores;
    }

    /**
     * @param mixed $atributosAnteriores
     */
    public function setAtributosAnteriores($atributosAnteriores)
    {
        $this->atributosAnteriores = $atributosAnteriores;
    }

    /**
     * @return mixed
     */
    public function getTipoAtributosAnteriores()
    {
        return $this->tipoAtributosAnteriores;
    }

    /**
     * @param mixed $tipoAtributosAnteriores
     */
    public function setTipoAtributosAnteriores($tipoAtributosAnteriores)
    {
        $this->tipoAtributosAnteriores = $tipoAtributosAnteriores;
    }

    function cadastrarCategoria()
    {
        try {
            $this->tabela = "categoria";
            $this->campos = array("nome", "datacriacao");
            $this->valores = array($this->nome, date("Y-m-d"));
            echo $this->getSql();
            if (!$this->cadastrar()) {
                return false;
            }
            $querySelectCategoria = $this->query("select max(id) as ultimoId from categoria");
            $r = mysqli_fetch_array($querySelectCategoria, MYSQLI_ASSOC);
            for ($i = 0; $i < count($this->atributos); $i++) {
                $sql = "insert into atributo (nome, tipo, categoria_id) VALUES ('" . $this->atributos[$i] . "', '" . $this->tipoAtributos[$i] . "', '" . $r['ultimoId'] . "')";
//                echo $sql . " ";
                $this->query($sql);
            }

        } catch (Exception $e) {
            echo "Exceção capturada: " . $e->getMessage();
            return false;
        }
        return true;
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

    function alterarCategoria()
    {


        try {

            $this->atributosAnteriores = $this->consultarAtributosCategoriaPeloIdDaCategoriaRetornandoUmArray($this->id);

            $tamanhoAtributosAnterior = count($this->atributosAnteriores) - 1;
            echo "Tamanho atributos anteriores: " . $tamanhoAtributosAnterior . " ";
            echo "Tamanho atributos atuais: " . count($this->atributos) . " ";
            for ($i = 0; $i < count($this->atributos); $i++) {
                echo $this->atributos[$i] . " ";
            }

            if (count($this->atributos) > $tamanhoAtributosAnterior) {
                $qtdAtributosDeDiferenca = count($this->atributos) - $tamanhoAtributosAnterior;
                for ($i = 0; $i < $qtdAtributosDeDiferenca; $i++) {
                    $sql = "insert into atributo (nome, tipo, categoria_id) VALUES ('" .
                        $this->atributos[(count($this->atributos) - 1) - $i] . "', '" .
                        $this->tipoAtributos[(count($this->atributos) - 1) - $i] . "', " . $this->id . ")";

//                    echo $sql;
                    $this->query($sql);


                }
                for ($j = 0; $j < count($this->tipoAtributos); $j++) {
                    if ($this->tipoAtributos[$j] != "nenhuma") {
                        $sqlDeleteValor = "delete from valor_atributo where atributo_categoria_id = $this->id";
                        $this->query($sqlDeleteValor);
                        $sql = "update atributo set tipo='" . $this->tipoAtributos[$j] . "' where nome='" . $this->tipoAtributosAnteriores[$j] . "'
                         and categoria_id='$this->id' and ativado = 1";
//                        echo $sql;
                        $this->query($sql);
                    }
                }

            }

            if (count($this->atributos) == $tamanhoAtributosAnterior) {
                for ($j = 0; $j < count($this->tipoAtributos); $j++) {
                    if ($this->tipoAtributos[$j] != "nenhuma") {
//                        echo $this->tipoAtributos[$j] . " ";
                        $sqlDeleteValor = "delete from valor_atributo where atributo_categoria_id = $this->id";
                        $this->query($sqlDeleteValor);
                        $sql = "update atributo set tipo='" . $this->tipoAtributos[$j] . "' where nome='" . $this->atributos[$j] . "'
                         and categoria_id='$this->id' and ativado=1";
                        $this->query($sql);
//                        echo $sql;

                    }
                }
            }
            if (count($this->atributos) < $tamanhoAtributosAnterior) {
                $result = array_diff($this->atributosAnteriores, $this->atributos);
                foreach ($result as $item) {
                    $sqlDeleteValor = "delete from valor_atributo where atributo_categoria_id = $this->id";
                    $this->query($sqlDeleteValor);
                    $sql = "update atributo set ativado = 0 WHERE nome = '" .
                        $item . "' and categoria_id = '" .
                        $this->id . "'; ";
//                    echo $sql;
                    $this->query($sql);
                }

            }


            return true;
        } catch (Exception $e) {
            return "Exceção capturada: " . $e->getMessage();

        }
    }

    function consultarAtributosCategoriaPeloIdDaCategoriaRetornandoUmArray($id_categoria)
    {
        $this->tabela = "atributo";
        $this->condicao = "categoria_id = $id_categoria and ativado = 1";
        $this->consultar();
        $atributos = "";
        $i = 0;
        while ($r = mysqli_fetch_array($this->query, MYSQLI_ASSOC)) {
            if ($i < $this->result) {
                $atributos .= "" . $r['nome'] . "|-|&";

            }

            $i++;
        }
        return explode("|-|&", $atributos);
    }

    function excluirCategoria($id)
    {
        try {
            return $this->delete("categoria", "ativado = 0, dataexclusao = '$this->data'", "id=$id");
        } catch (Exception $e) {
            echo "Exceção capturada: " . $e->getMessage();
            return null;
        }
    }

    function listarCategoria()
    {

        $this->condicao = "ativado = 1";
        $this->subQntColunasConsulTabela = 0;
//        $this->innerJoin("categoria", "atributo", "atributo.categoria_id", "categoria.id");
        //    $sql = "select categoria.id as id, categoria.nome as nome, datacriacao as criacao, atributo.id as aid from categoria INNER join atributo on categoria.id = atributo.categoria_id";
        $sql = "select id, nome, datacriacao as criacao from categoria WHERE ativado = 1";
        $query = $this->query($sql);
        if (mysqli_num_rows($query) > 0) {

            $this->gerarHeadPaginas();

            echo "
<body onload='calculaAltura()'>
<div class='content-wrapper'>
";
            $this->gerarCabecarioTabelaAdmin("categoria");
            $stringParametros = "";
            $arrayCampos = array("id", "nome");


            for ($i = 0; $i < count($arrayCampos); $i++) {
                echo "<th>" . ucfirst($arrayCampos[$i]) . "</th>";
            }
            echo "<th>Ações</th>";
            echo " </tr>
                </thead>";
            echo "<tbody>";
            while ($r = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                echo "<tr>";
                for ($i = 0; $i < count($arrayCampos); $i++) {
                    echo strtoupper("<td>" . $r[$arrayCampos[$i]] . "</td>");
                }
                for ($i = 0; $i < count($arrayCampos); $i++) {
                    if ($i < count($arrayCampos) - 1) {

                        $stringParametros .= $arrayCampos[$i] . "=" . $r[$arrayCampos[$i]] . "&";
                    } else {
                        $stringParametros .= $arrayCampos[$i] . "=" . $r[$arrayCampos[$i]];
                    }
                }
                $sql2 = "select id from atributo WHERE categoria_id = " . $r['id'] . " ";
                $query2 = $this->query($sql2);
                $i = 0;
                echo "<td style='width:180px;'><a class='btn btn-flat bg-purple' style='border-color: #5753a0; background-color: #605ca8 !important;' href='../view/frmAlterar" .
                    ucfirst('categoria') . ".php?" . $stringParametros . "'>Alterar</a>";
                $stringParametros = "";
                echo "<a class='btn btn-flat btn-danger' href='../controller/categoriaController.php?q=excluir&id=" .
                    $r[$arrayCampos[0]] . "'>Excluir</a></td>";
                echo "</tr>";
            }

            echo "    </tbody>";
            echo "
            <tfoot><tr>
                      ";
            $cont = count($arrayCampos);
            for ($i = 0; $i < $cont; $i++) {
                echo "
                        <th>" . ucfirst($arrayCampos[$i]) . "</th> ";
            }
            echo " </tr>
                    </tfoot>
                  </table>
                </div>
              </div>
              </section>
              </div>

    <!-- jQuery 2.1.4 -->
    <script src='../plugins/jQuery/jQuery-2.1.4.min.js'></script>
    <!-- Bootstrap 3.3.5 -->
    <script src='../bootstrap/js/bootstrap.min.js'></script>
    <!-- DataTables -->
    <script src='../plugins/datatables/jquery.dataTables.min.js'></script>
    <script src='../plugins/datatables/dataTables.bootstrap.min.js'></script>
    <!-- SlimScroll -->
    <script src='../plugins/slimScroll/jquery.slimscroll.min.js'></script>
    <!-- FastClick -->
    <script src='../plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src='../dist/js/app.min.js'></script>
    <!-- AdminLTE for demo purposes -->
    <script src='../dist/js/demo.js'></script>
    <!-- page script -->
    <script>
      $(function () {
        $('#tabela').DataTable({

        language: {
            lengthMenu: 'Mostrando _MENU_ registros por página',
            zeroRecords: 'Nada encontrado - me desculpe :(',
            info: 'Mostrando a página  _PAGE_  de  _PAGES_',
            infoEmpty: 'Sem registros disponíveis',
            infoFiltered: '(filtrado de um total de _MAX_ registros)',
            search: 'Procurar: ',
            paginate: {
        first: 'Primeiro',
        last: 'Ultimo',
        next: 'Próximo',
        previous: 'Anterior'
    }

        }
        });

//        $('#tabela').DataTable({
//          'paging': false,
//          'lengthChange': false,
//          'searching': false,
//          'ordering': false,
//          'info': false,
//          'autoWidth': false
//
//        });
      });
    </script>
//    <script>
           $('#tabela').ready(function() {
                var height = $('.box-body').height();
                $('body').height(height);
                })
       </script>
             </body>
              </html>";

        } else {

            echo "
<html>
    <head>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link rel='stylesheet' href='../bootstrap/css/bootstrap.min.css'>
        <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css'>
        <link rel='stylesheet' href='https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css'>
        <link rel='stylesheet' href='../dist/css/AdminLTE.min.css'>
        <link rel='stylesheet' href='../dist/css/skins/_all-skins.min.css'>
        <link rel='stylesheet' href='../plugins/iCheck/flat/blue.css'>
        <link rel='stylesheet' href='../plugins/morris/morris.css'>
        <link rel='stylesheet' href='../plugins/jvectormap/jquery-jvectormap-1.2.2.css'>
        <link rel='stylesheet' href='../plugins/datepicker/datepicker3.css'>
        <link rel='stylesheet' href='../plugins/daterangepicker/daterangepicker-bs3.css'>
        <link rel='stylesheet' href='../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css'>

        <style>
            #tabela_filter {
                text-align: right !important;
            }
        </style>

    </head>
			<body>
			<div class='content-wrapper'>
			<section class='content-header'>
          <h1>
            Listagem
            <small>de Categorias</small>
          </h1>
          <ol class='breadcrumb'>
            <li><a href='#'><i class='fa fa-dashboard'></i> Dashboard</a></li>
            <li><a href='#'>Listagem</a></li>
            <li class='active'>Categorias</li>
          </ol>
        </section>
        <section class='content'>
<div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'>Lista de categorias</h3>
                </div>
                <div class='box-body'>
			Nenhum resultado encontrado
			</div>
			</div>
			</section>
			</div>
			<body>
<!-- jQuery 2.1.4 -->
    <script src='../plugins/jQuery/jQuery-2.1.4.min.js'></script>
    <!-- Bootstrap 3.3.5 -->
    <script src='../bootstrap/js/bootstrap.min.js'></script>
    <!-- DataTables -->
    <script src='../plugins/datatables/jquery.dataTables.min.js'></script>
    <script src='../plugins/datatables/dataTables.bootstrap.min.js'></script>
    <!-- SlimScroll -->
    <script src='../plugins/slimScroll/jquery.slimscroll.min.js'></script>
    <!-- FastClick -->
    <script src='../plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src='../dist/js/app.min.js'></script>
    <!-- AdminLTE for demo purposes -->
    <script src='../dist/js/demo.js'></script>
</html>
";
        }
    }

    function pesquisarCategoria()
    {

    }

    function consultarCategoria()
    {
        $this->tabela = "categoria";
        $this->condicao = "ativado = 1";
        $this->consultar();
        while ($r = mysqli_fetch_array($this->query, MYSQLI_ASSOC)) {
            echo "<option value='" . $r['id'] . "'>" . $r['nome'] . "</option>";
        }


    }

    function consultarProdutoPorCategoria($id)
    {
        $this->innerJoin("produto", "categoria", "$id", "id");
        while ($r = mysqli_fetch_array($this->query, MYSQLI_ASSOC)) {
            echo "<option selected='selected' value='" . $r['id'] . "'>" . $r['nome'] . "</option>";
        }
    }

    function puxarCategoriaJaCadastrada($id)
    {
        $this->tabela = "categoria";
        $this->condicao = "ativado  =  1 and id = $id";
        $this->consultar();
        $r = mysqli_fetch_array($this->query, MYSQLI_ASSOC);
        if ($this->query) {
            return "<option selected='selected' value='" . $r['id'] . "'>" . $r['nome'] . "</option>";
        } else {
            return "<option selected='selected' value='0'>Nenhum</option>";
        }
    }

    function consultarAtributosCategoriaPeloIdDaCategoria($id_categoria)
    {
        $this->tabela = "atributo";
        $this->condicao = "categoria_id = $id_categoria and ativado = 1";
        $this->consultar();
        $i = 0;
        while ($r = mysqli_fetch_array($this->query, MYSQLI_ASSOC)) {
            $i++;
            echo "<option value='" . $r['nome'] . "'>" . $r['nome'] . "</option>";
        }
        return "";
    }

    function consultarAtributosCategoriaPeloIdDaCategoriaParaOAngular($id_categoria)
    {
        $this->tabela = "atributo";
        $this->condicao = "categoria_id = $id_categoria and ativado = 1";
        $this->consultar();
//        $numReg = $this->retornaNumRegistros("atributo", "categoria_id = $id_categoria and ativado = 1");
        $atributos = "";
        $i = 0;
        while ($r = mysqli_fetch_array($this->query, MYSQLI_ASSOC)) {
            $i++;
           $atributos .= "'" . $r['nome'] . "',";
//            if($i != $numReg)
//            else $atributos .= "'" . $r['nome'] . "'";
        }
        return $atributos;
    }

    function retornaTipoAtributo($categoria_id)
    {
        $sql = "select tipo from atributo where categoria_id = $categoria_id and ativado = 1";
        $r = mysqli_fetch_array($this->query($sql), MYSQLI_ASSOC);


        return $r['tipo'];
    }

    function retornaArrayTipoAtributo($categoria_id)
    {

        $sql = "select * from atributo where categoria_id = $categoria_id and ativado = 1";
        $tipoAtributo = "";
        $i = 0;
        while ($r = mysqli_fetch_array($this->query($sql), MYSQLI_ASSOC)) {
            if ($i != $this->result) {
                $tipoAtributo .= $r['tipo'] . ",";
            }
            if ($i == $this->result - 1) {
                $tipoAtributo .= $r['tipo'] . "";
            }
        };
        return explode(",", $tipoAtributo);
    }

    function retornaNomeAtributo($categoria_id)
    {
        $sql = "select nome from atributo where categoria_id = $categoria_id and ativado = 1";
        $r = mysqli_fetch_array($this->query($sql), MYSQLI_ASSOC);

        return $r['nome'];
    }


}