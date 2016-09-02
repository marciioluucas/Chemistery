<?php
/**
 * Created by PhpStorm.
 * User: Márcio Lucas
 * E-mail: marciioluucas@gmail.com
 * Date: 10/06/2016
 * Time: 10:09
 */

$jeysao = file_get_contents("../sources/jsons/menu.json");
echo $x= base64_encode($jeysao);
echo "\n\n";
echo base64_decode($x);