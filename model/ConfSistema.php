<?php
require_once 'Banco.php';


/**
 * Created by PhpStorm.
 * User: Márcio Lucas
 * E-mail: marciioluucas@gmail.com
 * Date: 18/05/2016
 * Time: 14:14
 */
class ConfSistema extends Banco
{
    private $cor;
    private $imagemPadrao;

    /**
     * @return mixed
     */
    public function getCor()
    {
        return $this->cor;
    }

    /**
     * @param mixed $cor
     */
    public function setCor($cor)
    {
        $this->cor = $cor;
    }

    /**
     * @return mixed
     */
    public function getImagemPadrao()
    {
        return $this->imagemPadrao;
    }

    /**
     * @param mixed $imagemPadrao
     */
    public function setImagemPadrao($imagemPadrao)
    {
        $this->imagemPadrao = $imagemPadrao;
    }



    public function alterarCor($hex)
    {
        return $this->alterar("cor", "valorHexadecimal = '" . $hex . "'", "1=1");
    }

    public function alterarImagemPadrao($enderecoImagem){
        $sql = "ALTER TABLE bd_catalogo.produto ALTER COLUMN imagemprincipal SET DEFAULT '".$enderecoImagem."';";
        if($this->query($sql)){
         return true;
        }else{
            return false;
        }
    }

    public function retornaCorSQL(){
        $sql = "select valorHexadecimal from cor";
        $r = mysqli_fetch_array($this->query($sql), MYSQLI_ASSOC);
        return $r['valorHexadecimal'];
    }

}