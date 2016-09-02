<?php
/**
 * Created by PhpStorm.
 * User: Márcio Lucas
 * E-mail: marciioluucas@gmail.com
 * Date: 30/05/2016
 * Time: 10:36
 */

$url = 'https://svn.riouxsvn.com/catalogv10';
$output = `svn info $url`;
//$fp = fopen("\\xampp\\htdocs\\CataLOG\\catalogv10\\versao", $output);
//$escreve = fwrite($fp, $output);
//fclose($fp);
echo $output;