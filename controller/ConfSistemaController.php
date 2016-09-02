<?php
require_once '../model/ConfSistema.php';
require_once '../model/Imagem.php';

/**
 * Created by PhpStorm.
 * User: Márcio Lucas
 * E-mail: marciioluucas@gmail.com
 * Date: 18/05/2016
 * Time: 11:26
 */
class ConfSistemaController
{
    private $confSistema;
    private $hex;
    private $imagemPadrao;
    private $image;

    /**
     * @return ConfSistema
     */
    public function getHex()
    {
        return $this->hex;
    }

    /**
     * @param ConfSistema $hex
     */
    public function setHex($hex)
    {
        $this->hex = $hex;
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


    function __construct()
    {
        $this->confSistema = new ConfSistema();
        $this->image = new Imagem();
        if (isset($_POST['question'])) {
            if ($_POST['question'] == "alterarCorPadrao") {
                
                echo $this->confSistema->alterarCor($_POST['hex']) ? "
                <script>alert('Alteração de cor padrão de produto efetuada com sucesso!') </script>"
                    : "<script>alert('Alteração de cor padrão de produto com erro!!')</script>";
                echo "<script>window.location.replace('../view/frmAlterarCorPadrao.php');</script>";
            }
            if ($_POST['question'] == "alterarImagemPadrao") {
                $this->image->setArquivoNome($_FILES['produtoImagemPadrao']['name']);
                $this->image->setArquivoErro($_FILES['produtoImagemPadrao']['error']);
                $this->image->setArquivoTemporarioNome($_FILES['produtoImagemPadrao']['tmp_name']);
                $this->image->setArquivoExtensao($_FILES['produtoImagemPadrao']['type']);
                echo $this->confSistema->alterarImagemPadrao($this->image->upload()) ? "<script>alert('Alteração de imagem padrão de produto efetuada com sucesso!')</script> "
                    : "<script>alert('Alteração de imagem padrão de produto com erro!!')</script>";
                echo "<script>window.location.replace('../view/frmAlterarCorPadrao.php');</script>";
            }
        }

    }

    public function retornaCor()
    {
        return $this->confSistema->retornaCorSQL();
    }
}

new ConfSistemaController();