<?php
/**
 * Created by PhpStorm.
 * User: Márcio Lucas
 * E-mail: marciioluucas@gmail.com
 * Date: 01/06/2016
 * Time: 14:00
 */

$path = "../test/img";
$diretorio = dir($path);
$i = 0;
while ($arquivo = $diretorio->read()) {
    $extensao = pathinfo($arquivo, PATHINFO_EXTENSION);
    if ($i > 1) {
        if (strstr(".jpg;", $extensao)) {
            $source = imagecreatefromjpeg($path . "/" . $arquivo);
            (imagejpeg($source, $path . "/" . $arquivo, 70)) ? printf("Deu certo! $arquivo  |\n  ") : printf("Deu errado!");
        }
        if(strstr(".png;", $extensao)){
            $source = imagecreatefrompng($path . "/" . $arquivo);
            (imagejpeg($source, $path . "/" . $arquivo, 70)) ? printf("Deu certo! $arquivo  |\n  ") : printf("Deu errado!");
        }
    }
    $i++;
}
$diretorio->close();