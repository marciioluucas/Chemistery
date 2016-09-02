<?php
/**
 * Created by PhpStorm.
 * User: Márcio Lucas
 * E-mail: marciioluucas@gmail.com
 * Date: 01/06/2016
 * Time: 14:41
 */

$l = "X,A,B,L,A,U";
$l = explode(",", $l);
var_dump($l);
unset($l[1]);

$l = implode(",", $l);
var_dump($l);