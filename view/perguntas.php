<?php
/**
 * Created by PhpStorm.
 * User: Márcio Lucas
 * E-mail: marciioluucas@gmail.com
 * Date: 23/06/2016
 * Time: 15:53
 */

require_once "../view/protecaoPaginas.php";
require_once "../controller/ProdutoController.php";
require_once "../controller/UsuarioController.php";
require_once "../controller/PerguntaController.php";
$usuarioController = new UsuarioController();
$produtoController = new ProdutoController();

?>

<style>
    @media only screen and (max-width: 800px) {

        /* Force table to not be like tables anymore */
        #no-more-tables table,
        #no-more-tables thead,
        #no-more-tables tbody,
        #no-more-tables th,
        #no-more-tables td,
        #no-more-tables tr {
            display: block;
        }

        /* Hide table headers (but not display: none;, for accessibility) */
        #no-more-tables thead tr {
            position: absolute;
            top: -9999px;
            left: -9999px;
        }

        #no-more-tables tr {
            border: 1px solid #ccc;
        }

        #no-more-tables td {
            border: none;
            border-bottom: 1px solid #eee;
            position: relative;
            padding-left: 50%;
            white-space: normal;
        }

        #no-more-tables td:before {
            /* Now like a table header */
            position: absolute;
            /* Top/left values mimic padding */
            top: 6px;
            left: 6px;
            width: 45%;
            padding-right: 10px;
            white-space: nowrap;

        }

        #no-more-tables td:before {
            content: attr(data-title);
        }
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">
                Listando perguntas!
            </h1>
            <h3 class="text-center">
                <?php echo $_SESSION['nomeUsuario'] . ", aqui estão listadas suas perguntas."; ?>
            </h3>
            <div class="callout callout-white">
                <h4>Dica</h4>
                <p>Você pode ver se sua pegunta está respondida na coluna de Status </p>
            </div>
        </div>
        <div id="no-more-tables">
            <table class="col-md-12 table-bordered table-striped table-condensed cf">
                <thead class="cf">
                <tr>
                    <th style="width: 30px">ID</th>
                    <th>Produto</th>
                    <th style="width: 100px">Pergunta</th>
                    <th style="width: 50px">Status</th>
                    <th style="width: 50px">Visualizar</th>
                </tr>
                </thead>
                <?php
                $perguntaController = new PerguntaController();
                $q = $perguntaController->consultaPerguntaByIdUsuario('usuario.id = ' . $_SESSION['idUsuario']);
                while ($r = mysqli_fetch_array($q, MYSQLI_ASSOC)) {
                    echo "<tr>";
                    echo "<td>" . $r['pergid'] . "</td>";
                    echo "<td style='width: 20%'>" . $produtoController->retornaAlgoDoProdutoQueEuQueira('nome', $r['produto_id']) . "</td>";
                    echo "<td>" . $r['descricao'] . "</td>";
                    echo "<td>" . strtoupper($r['status']) . "</td>";
                    echo "<td><a href='#' id='".$r['pergid']."'><i class='fa fa-eye'></i></a></td>";
                    echo "</tr>";
                    echo "
<script>
            $('#".$r['pergid']."').click(function(){
                $('#body').load(\"discussao.php?id='" . $r['pergid'] . "'\")
    })
</script>";
                } ?>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>
