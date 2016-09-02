<?php

/**
 * Created by PhpStorm.
 * User: Marcio Lucas
 * Date: 11/03/2016
 * Time: 10:30
 */
class Imagem
{
    private $arquivo;
    private $arquivoNome;
    private $arquivoErro;
    private $arquivoNovoNome;
    private $arquivoExtensao;
    private $arquivoDestino;
    private $arquivoTemporarioNome;
    private $arquivoTipo;
    private $caminho;
    private $caminhoTemporario;
    private $totalImagens;
    private $totalMaxImagens = 9;
    private $anguloDeRotacao;
    
    /**
     * @return mixed
     */
    public function getCaminho()
    {
        return $this->caminho;
    }

    /**
     * @param mixed $caminho
     */
    public function setCaminho($caminho)
    {
        $this->caminho = $caminho;
    }

    /**
     * @return mixed
     */
    public function getCaminhoTemporario()
    {
        return $this->caminhoTemporario;
    }

    /**
     * @param mixed $caminhoTemporario
     */
    public function setCaminhoTemporario($caminhoTemporario)
    {
        $this->caminhoTemporario = $caminhoTemporario;
    }

    /**
     * @return mixed
     */
    public function getArquivo()
    {
        return $this->arquivo;
    }

    /**
     * @param mixed $arquivo
     */
    public function setArquivo($arquivo)
    {
        $this->arquivo = $arquivo;
    }

    /**
     * @return mixed
     */
    public function getArquivoNome()
    {
        return $this->arquivoNome;
    }

    /**
     * @param mixed $arquivoNome
     */
    public function setArquivoNome($arquivoNome)
    {
        $this->arquivoNome = $arquivoNome;
    }

    /**
     * @return mixed
     */
    public function getArquivoErro()
    {
        return $this->arquivoErro;
    }

    /**
     * @param mixed $arquivoErro
     */
    public function setArquivoErro($arquivoErro)
    {
        $this->arquivoErro = $arquivoErro;
    }

    /**
     * @return mixed
     */
    public function getArquivoExtensao()
    {
        return $this->arquivoExtensao;
    }

    /**
     * @param mixed $arquivoExtensao
     */
    public function setArquivoExtensao($arquivoExtensao)
    {
        $this->arquivoExtensao = $arquivoExtensao;
    }

    /**
     * @return mixed
     */
    public function getArquivoNovoNome()
    {
        return $this->arquivoNovoNome;
    }

    /**
     * @param mixed $arquivoNovoNome
     */
    public function setArquivoNovoNome($arquivoNovoNome)
    {
        $this->arquivoNovoNome = $arquivoNovoNome;
    }

    /**
     * @return mixed
     */
    public function getArquivoDestino()
    {
        return $this->arquivoDestino;
    }

    /**
     * @param mixed $arquivoDestino
     */
    public function setArquivoDestino($arquivoDestino)
    {
        $this->arquivoDestino = $arquivoDestino;
    }

    /**
     * @return mixed
     */
    public function getArquivoTemporarioNome()
    {
        return $this->arquivoTemporarioNome;
    }

    /**
     * @param mixed $arquivoTemporarioNome
     */
    public function setArquivoTemporarioNome($arquivoTemporarioNome)
    {
        $this->arquivoTemporarioNome = $arquivoTemporarioNome;
    }

    /**
     * @return mixed
     */
    public function getTotalImagens()
    {
        return $this->totalImagens;
    }

    /**
     * @param mixed $totalImagens
     */
    public function setTotalImagens($totalImagens)
    {
        $this->totalImagens = $totalImagens;
    }

    /**
     * @return mixed
     */
    public function getAnguloDeRotacao()
    {
        return $this->anguloDeRotacao;
    }

    /**
     * @param mixed $anguloDeRotacao
     */
    public function setAnguloDeRotacao($anguloDeRotacao)
    {
        $this->anguloDeRotacao = $anguloDeRotacao;
    }

    /**
     * @return mixed
     */

    
    
    
    public function upload()
    {
        try {
            if (isset($this->arquivoNome) && $this->arquivoErro == 0) {

                $this->caminhoTemporario = $this->arquivoTemporarioNome;
                $this->arquivoExtensao = pathinfo($this->arquivoNome, PATHINFO_EXTENSION);
                $this->arquivoExtensao = strtolower($this->arquivoExtensao);

                if (strstr(".jpg;.jpeg;", $this->arquivoExtensao)) {
                    $this->arquivoNovoNome = uniqid(time());
                    $this->arquivoDestino = "../imagens/mupload" . $this->arquivoNovoNome . ".jpg";
                    $source = imagecreatefromjpeg($this->caminhoTemporario);
                    imagealphablending($source, false);
                    imagesavealpha($source, true);
                    $rotang = 360 - $this->anguloDeRotacao;
                    $rotation = imagerotate($source, $rotang, imagecolorallocatealpha($source, 255, 255, 255, 127));
                    imagealphablending($rotation, false);
                    imagesavealpha($rotation, true);
                    imagejpeg($rotation, $this->arquivoDestino, 65);
//                    echo $this->arquivoDestino;
                    return $this->arquivoDestino;

                }
                if (strstr(".png;", $this->arquivoExtensao)) {
                    $this->arquivoNovoNome = uniqid(time());
                    $this->arquivoDestino = "../imagens/mupload" . $this->arquivoNovoNome . ".jpg";
                    $source = imagecreatefrompng($this->caminhoTemporario);
                    imagealphablending($source, false);
                    imagesavealpha($source, true);
                    $rotang = 360 - $this->anguloDeRotacao;
                    $rotation = imagerotate($source, $rotang, imagecolorallocatealpha($source, 255, 255, 255, 127));
                    imagealphablending($rotation, false);
                    imagesavealpha($rotation, true);
                    imagejpeg($rotation, $this->arquivoDestino, 65);
//                    echo $this->arquivoDestino;
                    return $this->arquivoDestino;

                }
            } else {
                return false;
            }
        } catch (Exception $e) {
            $e->getMessage();
        }
        return false;
    }

    public function uploadMultiplo()
    {
        try {
            if (isset($this->arquivoNome) && $this->arquivoErro == 0) {

                $this->caminhoTemporario = $this->arquivoTemporarioNome;
                $this->arquivoExtensao = pathinfo($this->arquivoNome, PATHINFO_EXTENSION);
                $this->arquivoExtensao = strtolower($this->arquivoExtensao);

                if (strstr(".jpg;.jpeg;", $this->arquivoExtensao)) {
                    $this->arquivoNovoNome = uniqid(time());
                    $this->arquivoDestino = "../imagens/mupload" . $this->arquivoNovoNome . ".jpg";
                    $source = imagecreatefromjpeg($this->caminhoTemporario);
                    imagealphablending($source, false);
                    imagesavealpha($source, true);
                    $rotang = 360 - $this->anguloDeRotacao;
                    $rotation = imagerotate($source, $rotang, imagecolorallocatealpha($source, 255, 255, 255, 127));
                    imagealphablending($rotation, false);
                    imagesavealpha($rotation, true);
                    imagejpeg($rotation, $this->arquivoDestino, 65);
                    return $this->arquivoDestino;

                }
                if (strstr(".png;", $this->arquivoExtensao)) {
                    $this->arquivoNovoNome = uniqid(time());
                    $this->arquivoDestino = "../imagens/mupload" . $this->arquivoNovoNome . ".jpg";
                    $source = imagecreatefrompng($this->caminhoTemporario);
                    imagealphablending($source, false);
                    imagesavealpha($source, true);
                    $rotang = 360 - $this->anguloDeRotacao;
                    $rotation = imagerotate($source, $rotang, imagecolorallocatealpha($source, 255, 255, 255, 127));
                    imagealphablending($rotation, false);
                    imagesavealpha($rotation, true);
                    imagejpeg($rotation, $this->arquivoDestino, 65);
                    return $this->arquivoDestino;

                }
            } else {
                return false;
            }
        } catch (Exception $e) {
            $e->getMessage();
        }
        return false;
    }

    public function rotacaoImagemSemUpload()
    {
        try {

            $this->arquivoExtensao = pathinfo($this->caminho, PATHINFO_EXTENSION);
            if (strstr(".jpg;.jpeg;", $this->arquivoExtensao)) {
                $source = imagecreatefromjpeg($this->caminho);
                imagealphablending($source, false);
                imagesavealpha($source, true);
                $rotang = 360 - $this->anguloDeRotacao;
                $rotation = imagerotate($source, $rotang, imagecolorallocatealpha($source, 255, 255, 255, 127));
                imagealphablending($rotation, false);
                imagesavealpha($rotation, true);
                imagejpeg($rotation, $this->caminho, 100);
                return true;
            }


            if (strstr(".png;", $this->arquivoExtensao)) {
                $source = imagecreatefrompng($this->caminho);
                imagealphablending($source, false);
                imagesavealpha($source, true);
                $rotang = 360 - $this->anguloDeRotacao;
                $rotation = imagerotate($source, $rotang, imagecolorallocatealpha($source, 255, 255, 255, 127));
                imagealphablending($rotation, false);
                imagesavealpha($rotation, true);
                imagejpeg($rotation, $this->caminho, 100);
                return true;

            } else {
                return false;
            }
        } catch (Exception $e) {
            $e->getMessage();
        }

        return false;
    }

}