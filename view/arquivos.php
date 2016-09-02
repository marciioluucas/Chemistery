<?php
require_once '../controller/ArquivoController.php';
/**
 * Created by PhpStorm.
 * User: Márcio Lucas
 * E-mail: marciioluucas@gmail.com
 * Date: 23/06/2016
 * Time: 15:53
 */

require_once "protecaoPaginas.php";
$arquivoController = new ArquivoController();

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

            #no-more-tables tr { border: 1px solid #ccc; }

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

            /*
            Label the data
            */
            #no-more-tables td:before { content: attr(data-title); }
        }
    </style>

    <!-- Bootstrap 3.3.5 -->


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">
Seus arquivos
</h1>
            <h3 class="text-center">
              <?php echo $_SESSION['nomeUsuario'] . ", aqui estão seus arquivos."; ?>
</h3>
</div>
<div id="no-more-tables">
    <table class="col-md-12 table-bordered table-striped table-condensed cf">
        <thead class="cf">
        <tr>
            <th style="width: 30px">#</th>
            <th>Nome do arquivo</th>
            <th style="width: 100px">Extensão</th>
            <th style="width: 50px">Baixar</th>
            <th style="width: 50px">Visualizar</th>

        </tr>
        </thead>
        <tbody>
        <?php $arquivoController->listagem(); ?>
        </tbody>
    </table>
</div>
    </div>
</div>
