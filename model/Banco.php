<?php

/**
 * Created by PhpStorm.
 * User: Marcio Lucas
 * Date: 10/03/2016
 * Time: 08:43
 */
class Banco
{
    private $sql;
    public $query;
    public $result;
    private $host;
    private $usuario;
    private $senha;
    private $banco;
    public $tabela;
    public $campos;
    public $valores;
    public $condicao;
    private $camposQuery = null;
    private $valoresQuery = null;
    private $resultQuery;
    public $r;
    public $subQntColunasConsulTabela;

    /**
     * @return mixed
     */
    public function getSql()
    {
        return $this->sql;
    }

    /**
     * @param mixed $sql
     */
    public function setSql($sql)
    {
        $this->sql = $sql;
    }

    /**
     * @return mixed
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * @param mixed $host
     */
    public function setHost($host)
    {
        $this->host = $host;
    }

    /**
     * @return mixed
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * @param mixed $usuario
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }

    /**
     * @return mixed
     */
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * @param mixed $senha
     */
    public function setSenha($senha)
    {
        $this->senha = $senha;
    }

    /**
     * @return mixed
     */
    public function getBanco()
    {
        return $this->banco;
    }

    /**
     * @param mixed $banco
     */
    public function setBanco($banco)
    {
        $this->banco = $banco;
    }

    /**
     * @return mixed
     */
    public function getQuery()
    {
        return $this->query;
    }

    /**
     * @param mixed $query
     */
    public function setQuery($query)
    {
        $this->query = $query;
    }

    /**
     * @return mixed
     */
    public function getResultQuery()
    {
        return $this->resultQuery;
    }

    /**
     * @param mixed $resultQuery
     */
    public function setResultQuery($resultQuery)
    {
        $this->resultQuery = $resultQuery;
    }


    public function __construct()
    {
        $this->conexao();
    }

    private function conexao()
    {

        $this->host = "localhost";
        $this->banco = "bd_catalogo";
        $this->usuario = "root";
        $this->senha = "";

        if (mysqli_connect($this->host, $this->usuario, $this->senha, $this->banco)) {

            return mysqli_connect($this->host, $this->usuario, $this->senha, $this->banco);

        } else {
            echo "Erro na conexao do banco";
            die();
        }
    }


    public function query($sql)
    {
        return mysqli_query($this->conexao(), $sql);
    }

    private function gerarQuery($tipo)
    {
        $cont = count($this->campos);
        for ($i = 0; $i < $cont; $i++) {
            if ($i < $cont - 1) {
                if ($tipo == 1) {
                    $this->camposQuery .= $this->campos[$i] . ", ";
                    $this->valoresQuery .= "'" . $this->valores[$i] . "', ";
                }
                if ($tipo == 2) {
                    $this->camposQuery .= $this->campos[$i] . " = ";
                    $this->valoresQuery .= "'" . $this->valores[$i] . "', ";
                    $this->camposQuery .= $this->camposQuery . $this->valoresQuery;
                }
            } else {
                if ($tipo == 1) {
                    $this->camposQuery .= $this->campos[$i];
                    $this->valoresQuery .= "'" . $this->valores[$i] . "'";
                }
                if ($tipo == 2) {
                    $this->camposQuery .= $this->campos[$i] . " = ";
                    $this->valoresQuery .= "'" . $this->valores[$i] . "'";
                    $this->camposQuery .= $this->camposQuery . $this->valoresQuery;
                }
            }
        }
    }


    public function cadastrar()
    {
        $this->gerarQuery(1);
        $this->sql = "INSERT INTO " . $this->tabela . " (" . $this->camposQuery . ") VALUES (" . $this->valoresQuery . ")";
        echo $this->sql;
        $this->query = mysqli_query($this->conexao(), $this->sql);
        $this->result = mysqli_affected_rows($this->conexao());
        if ($this->query) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param $condicao
     * @example alterar("alunos", "nome=Joao, serie=3 periodo", "id=16");
     * @return int
     */
    public function alterar($tabela, $campos_eq_valores, $id)
    {

        $sql = "UPDATE " . $tabela . " SET " . $campos_eq_valores . " WHERE " . " id = " . $id;
        $this->query = $this->query($sql);
        $this->resultQuery = mysqli_affected_rows($this->conexao());
//        echo $this->query;
        if ($this->query) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param $tabela
     * @param $colunas_eq_valores
     */
    public function delete($tabela, $colunas_eq_valores, $condicao)
    {
        $sql = "UPDATE " . $tabela . " SET " . $colunas_eq_valores . " WHERE " . $condicao;
        $this->query = $this->query($sql);
        $this->resultQuery = mysqli_affected_rows($this->conexao());

        return $this->resultQuery;
    }

    public function updateComCondicaoPersonalizada($tabela, $colunas_eq_valores, $condicao)
    {
        $sql = "UPDATE " . $tabela . " SET " . $colunas_eq_valores . " WHERE " . $condicao;
        $this->query = $this->query($sql);
        $this->resultQuery = mysqli_affected_rows($this->conexao());

        return $this->resultQuery;
    }


    /**
     * @param $tabela
     * @param $colunas
     * @example listar("usuarios", "nome, endereco, cpf");
     */
    public function listar()
    {

    $this->sql = "SELECT * FROM " . $this->tabela . " WHERE " . $this->condicao . " order by id desc";



//        $this->sql = "SELECT " . $this->campos . " FROM " . $this->tabela . " WHERE " . $this->condicao;


        $this->query = mysqli_query($this->conexao(), $this->sql);
        $this->result = mysqli_affected_rows($this->conexao());

        if (mysqli_num_rows($this->query) > 0) {

            $this->gerarHeadPaginas();

            echo "

<body>
<div class='content-wrapper'>
";
            $this->gerarCabecarioTabelaAdmin($this->tabela);
            $stringParametros = "";
            $cont = count($this->campos);


            for ($i = 0; $i < $cont - $this->subQntColunasConsulTabela; $i++) {
                echo "<th>" . ucfirst($this->campos[$i]) . "</th>";
            }
            echo "<th>Ações</th>";
            echo " </tr>
                </thead>";
            echo "<tbody>";
            while ($r = mysqli_fetch_array($this->query, MYSQLI_ASSOC)) {
                echo "<tr>";
                for ($i = 0; $i < count($this->campos) - $this->subQntColunasConsulTabela; $i++) {
                    echo strtoupper("<td>" . str_replace("_"," ", $r[$this->campos[$i]]) . "</td>");
                }
                for ($i = 0; $i < $cont; $i++) {
                    if ($i < $cont - 1) {

                        $stringParametros .= $this->campos[$i] . "=" . $r[$this->campos[$i]] . "&";
                    } else {
                        $stringParametros .= $this->campos[$i] . "=" . $r[$this->campos[$i]];
                    }
                }
                echo "<td style='width:180px;'><a class='btn btn-flat bg-purple' style='border-color: #5753a0; background-color: #605ca8 !important;' href='../view/frmAlterar" . ucfirst($this->tabela) . ".php?" . $stringParametros . "'>Alterar</a>";
                $stringParametros = "";
                echo "<a class='btn btn-flat btn-danger' href='../controller/" . ucfirst($this->tabela) . "Controller.php?q=excluir&id=" . $r[$this->campos[0]] . "'>Excluir</a></td>";
                echo "</tr>";
            }
            echo "    </tbody>";
            echo "
            <tfoot><tr>
                      ";
            $cont = count($this->campos);
            for ($i = 0; $i < $cont - $this->subQntColunasConsulTabela; $i++) {
                echo "
                        <th>" . ucfirst($this->campos[$i]) . "</th> ";
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
    <script>
    
           $(window).ready(function() {
                $(window).resize(function(){
        $(\"body\").setHeight($(window).height());
    })
           });
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
			<body style='height: 100%'>
			<div class='content-wrapper'>
			<section class='content-header'>
          <h1>
            Listagem
            <small>de " . $this->tabela . "s</small>
          </h1>
          <ol class='breadcrumb'>
            <li><a href='#'><i class='fa fa-dashboard'></i> Dashboard</a></li>
            <li><a href='#'>Listagem</a></li>
            <li class='active'>" . ucfirst($this->tabela) . "s</li>
          </ol>
        </section>
        <section class='content'>
<div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'>Lista de " . ucfirst($this->tabela) . "</h3>
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
    <script>
     $(body).ready(function () {
     $(\"#tabela\").setHeight($(window).height());
     })
     </script>
</html>
";
        }
    }

    public function pesquisar($tabela, $colunas, $condicao)
    {
        $strColunas = str_replace(", ", "', '", $colunas);
        $cols = array($strColunas);
        $cont = count($cols);
        $sql = "SELECT " . $cols . " FROM " . $tabela . " WHERE " . $condicao;
        $this->query = $this->query($sql);
        $resultado = $this->query;

        if ($resultado->num_rows > 0) {
            while ($r = $resultado->fetch_row()) {


                for ($i = 0; $i < $cont; $i++) {
                    if ($i < $cont - 1) {

                        echo $r["$cols[$i]"] . " ";


                    } else {
                        echo $r["$cols[$i]"] . "<br>";
                    }
                }
            }
        } else {
            echo "Nenhum resultado encontrado";
        }

    }

    public function gerarHeadPaginas()
    {
        echo "<html>
    <head>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport' content=\"no-cache\">
        <link rel='stylesheet' href='../bootstrap/css/bootstrap.min.css'>
        <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css'>
        <link rel='stylesheet' href='https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css'>
        <link rel='stylesheet' href='../dist/css/AdminLTE.min.css'>
        <link rel='stylesheet' href='../dist/css/skins/_all-skins.min.css'>
        <link rel='stylesheet' href='../plugins/iCheck/flat/blue.css'>
        <link rel='stylesheet' href='../plugins/jvectormap/jquery-jvectormap-1.2.2.css'>
        <link rel='stylesheet' href='../plugins/datepicker/datepicker3.css'>
        <link rel='stylesheet' href='../plugins/daterangepicker/daterangepicker-bs3.css'>
        <link rel='stylesheet' href='../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css'>

        <style>
            #tabela_filter {
                text-align: right !important;
            }
            
            .active a{
            background-color: #605ca8 !important;
            border-color: #6662af !important;
            }
        </style>

    </head>";
    }

    public function gerarCabecarioTabelaAdmin($tabela)
    {
        echo "<section class='content-header'>
          <h1>
            Listagem
            <small>de " . $tabela . "s</small>
          </h1>
          <ol class='breadcrumb'>
            <li><a href='#'><i class='fa fa-dashboard'></i> Dashboard</a></li>
            <li><a href='#'>Listagem</a></li>
            <li class='active'>" . ucfirst($tabela) . "s</li>
          </ol>
        </section>
        <section class='content'>
<div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'>Lista de " . ucfirst($tabela) . "</h3>
                </div>
                <div class='box-body'>
                  <table id='tabela' class='table table-bordered table-hover'>

                    <thead>
                      <tr>
                      ";
    }

    public function retornaNumRegistros($tabela, $condicao)
    {
        $this->sql = "SELECT * FROM $tabela where $condicao";
        $this->query = mysqli_query($this->conexao(), $this->sql);
        $this->result = mysqli_affected_rows($this->conexao());
//        echo $this->sql;

        return mysqli_num_rows($this->query);
    }

    public function retornaNumRegistrosDigitandoSQL($sql)
    {
        $this->sql = $sql;
        $this->query = mysqli_query($this->conexao(), $this->sql);
        $this->result = mysqli_affected_rows($this->conexao());
//        echo $this->sql;

        return mysqli_num_rows($this->query);
    }

    public function consultar()
    {

        $this->sql = "SELECT * FROM " . $this->tabela . " WHERE " . $this->condicao;
        $this->query = mysqli_query($this->conexao(), $this->sql);
        $this->result = mysqli_num_rows($this->query);


    }
    
    public function listarUsandoSQL(){
        $this->sql = "SELECT $this->campos FROM " . $this->tabela . " WHERE " . $this->condicao;
        $this->query = mysqli_query($this->conexao(), $this->sql);
        $this->result = mysqli_num_rows($this->query);
    }


    public function innerJoin($tabelaEsq, $tabelaDir, $fk, $pk, $condicao)
    {

        $this->sql = "select * from $tabelaEsq inner join $tabelaDir on $fk = $pk where " . $condicao;
        $this->query = $this->query($this->sql);
        $this->result = mysqli_affected_rows($this->conexao());

        

    }

    public function retornaSQLInnerJoin($tabelaEsq, $tabelaDir, $fk, $pk, $condicao){
        return "select * from $tabelaEsq inner join $tabelaDir on $fk = $pk where " . $condicao;
    }
    
    public function retornaSQLInnerJoinSemSelect($tabelaEsq, $tabelaDir, $fk, $pk){
        return "$tabelaEsq inner join $tabelaDir on $fk = $pk";
    }
}