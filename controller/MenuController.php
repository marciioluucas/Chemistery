<?php
require_once "../model/Menu.php";
/**
 * Created by PhpStorm.
 * User: Márcio Lucas
 * E-mail: marciioluucas@gmail.com
 * Date: 09/06/2016
 * Time: 09:57
 */
class MenuController
{
    private $menu;

    public function __construct()
    {
        $this->menu = new Menu();

    }

    /**
     * @return mixed
     */
    public function getMenu()
    {
        return $this->menu;
    }


    /**
     * Construtor da classe MenuController .
     */


    public function listarMenu($permissao){
     //   echo "<script>alert('".$permissao."')</script>";
        echo $this->menu->listarMenu($permissao);
    }
}

new MenuController();