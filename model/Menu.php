<?php

/**
 * Created by PhpStorm.
 * User: Márcio Lucas
 * E-mail: marciioluucas@gmail.com
 * Date: 09/06/2016
 * Time: 09:57
 */
class Menu
{
    private $codigo;
    private $descricao;
    private $icone;
    private $imagemIcone;
    private $url;
    private $permissao;

    /**
     * @return mixed
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * @param mixed $codigo
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
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
    public function getIcone()
    {
        return $this->icone;
    }

    /**
     * @param mixed $icone
     */
    public function setIcone($icone)
    {
        $this->icone = $icone;
    }

    /**
     * @return mixed
     */
    public function getImagemIcone()
    {
        return $this->imagemIcone;
    }

    /**
     * @param mixed $imagemIcone
     */
    public function setImagemIcone($imagemIcone)
    {
        $this->imagemIcone = $imagemIcone;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param mixed $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return mixed
     */
    public function getPermissao()
    {
        return $this->permissao;
    }

    /**
     * @param mixed $permissao
     */
    public function setPermissao($permissao)
    {
        $this->permissao = $permissao;
    }

    public function listarMenu($permissao)
    {
        $json = "../sources/jsons/menu.json";
        $info = file_get_contents($json);

        $filhoDoJ = json_decode($info);
        $stringRetornoHTML = "";
        $classe = "class=\"fa fa-angle-left pull-right\"";
        foreach ($filhoDoJ->menus as $item1) {
            if ($permissao >= $item1->permissao) {
                $stringRetornoHTML .= "<li class=\"treeview\">
                        <a href=\"#\">
                            <i class=\"fa " . $item1->icone . "\"></i> <span>" . $item1->descricao . "</span> <i
                               "; if(isset($item1->menuList)) $stringRetornoHTML .= $classe; else $stringRetornoHTML .= ""; $stringRetornoHTML .= "></i>
                        </a>";
                if ($item1->menuList) {
                    $stringRetornoHTML .= "<ul class=\"treeview-menu\">";
                    foreach ($item1->menuList as $item2) {
                        $stringRetornoHTML .= "<li class=\"treeview\">
                        <a href=\"$item2->url\" target=\"iframePrincipal\">
                            <i class=\"fa " . $item2->icone . "\"></i> <span>" . $item2->descricao . "</span> <i
                                "; if(isset($item2->menuList)) $stringRetornoHTML .= $classe; else $stringRetornoHTML .= ""; $stringRetornoHTML .= "></i>
                        </a>";


                        if (isset($item2->menuList)) {

                            $stringRetornoHTML .= "<ul class=\"treeview-menu\">";
                            foreach ($item2->menuList as $item3) {
                                $stringRetornoHTML .= "<li class=\"treeview\">";
                                $stringRetornoHTML .= "<a href=\"$item3->url\" target=\"iframePrincipal\">
                            <i class=\"fa " . $item3->icone . "\"></i> <span>" . $item3->descricao . "</span> <i
                               ></i>
                        </a>";
                                $stringRetornoHTML .= "</li>";
                            }
                            $stringRetornoHTML .= "</ul>";
                        }
                        $stringRetornoHTML .= "</li>";
                    }
                    $stringRetornoHTML .= "</ul>";
                }
                $stringRetornoHTML .= "</li>";
            }

        }
        return $stringRetornoHTML;
    }
}