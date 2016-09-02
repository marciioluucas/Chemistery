<?php

/**
 * Created by PhpStorm.
 * User: Márcio Lucas
 * E-mail: marciioluucas@gmail.com
 * Date: 22/06/2016
 * Time: 09:53
 */
class UploadArquivo extends Banco
{
    private $arquivoNome;
    private $arquivoErro;
    private $arquivoNovoNome;
    private $arquivoExtensao;
    private $arquivoDestino;
    private $arquivoTemporarioNome;
    private $caminhoTemporario;

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


    public function cadastroArquivo()
    {
        try {
            if (isset($this->arquivoNome) && $this->arquivoErro == 0) {

                $this->caminhoTemporario = $this->arquivoTemporarioNome;
                $this->arquivoExtensao = pathinfo($this->arquivoNome, PATHINFO_EXTENSION);
                $this->arquivoExtensao = strtolower($this->arquivoExtensao);
                if (!strstr(".php;.html;.css", $this->arquivoExtensao)) {
                    $this->arquivoNovoNome = uniqid(time());
                    $this->arquivoDestino = "../arquivos/mupload" . $this->arquivoNovoNome . "." . $this->arquivoExtensao;
                    if (move_uploaded_file($this->caminhoTemporario, $this->arquivoDestino)) {
                        try {
                            $this->tabela = "arquivo";
                            $this->campos = array("caminho", "extensao", "nome_original");
                            $this->valores = array($this->arquivoDestino, $this->arquivoExtensao, "mupload".$this->arquivoNovoNome . "." . $this->arquivoExtensao);
                            if ($this->cadastrar()) {
                                $this->condicao = "caminho = '$this->arquivoDestino'";
                                $this->consultar();
                                $r = mysqli_fetch_array($this->query, MYSQLI_ASSOC);
                                return $r['id'];
                            }
                        } catch (Exception $e) {
                            echo "Exceção capturada: " . $e->getMessage();
                            return false;
                        }
                        return false;
                    }
                    return false;


                }
            } else {
                return false;
            }
        } catch (Exception $e) {
            $e->getMessage();
        }
        return false;
    }
}