<?php
require_once("Banco.php");

/**
 * Created by PhpStorm.
 * User: Carlos Eduardo
 * Date: 10/03/2016
 * Time: 08:28
 */
class Usuario extends Banco
{
    private $id;
    private $nome;
    private $email;
    private $login;
    private $senha;
    private $nivel;
    private $ativade;
    private $imagem;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param mixed $login
     */
    public function setLogin($login)
    {
        $this->login = $login;
    }

    /**
     * @return mixed
     */
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * @param mixed $senha
     */
    public function setSenha($senha)
    {
        $this->senha = $senha;
    }

    /**
     * @return mixed
     */
    public function getNivel()
    {
        return $this->nivel;
    }

    /**
     * @param mixed $nivel
     */
    public function setNivel($nivel)
    {
        $this->nivel = $nivel;
    }

    /**
     * @return mixed
     */
    public function getAtivade()
    {
        return $this->ativade;
    }

    /**
     * @param mixed $ativade
     */
    public function setAtivade($ativade)
    {
        $this->ativade = $ativade;
    }

    /**
     * @return mixed
     */
    public function getImagem()
    {
        return $this->imagem;
    }

    /**
     * @param mixed $imagem
     */
    public function setImagem($imagem)
    {
        $this->imagem = $imagem;
    }
    
    

    function logar($login_ou_email, $senha, $tela)
    {
        if(isset($_SESSION)){
            session_destroy();
        }
        session_start();
        $this->tabela = "usuario";
        $this->condicao = "login = '$login_ou_email' or email = '$login_ou_email' AND senha = '$senha'";
        echo $this->getSql();
        $this->consultar();
        $resultado = mysqli_fetch_array($this->query, MYSQLI_ASSOC);
        if (mysqli_num_rows($this->query) > 0) {
            if (($login_ou_email == $resultado['login'] || $login_ou_email == $resultado['email']) && $senha == $resultado['senha']) {
                $_SESSION['idUsuario'] = $resultado['id'];
                $_SESSION['nomeUsuario'] = $resultado['nome'];
                $_SESSION['emailUsuario'] = $resultado['email'];
                $_SESSION['loginUsuario'] = $resultado['login'];
                $_SESSION['imagemUsuario'] = $resultado['imagem'];
                $_SESSION['senhaUsuario'] = $resultado['senha'];
                $_SESSION['nivelUsuario'] = $resultado['nivel'];
                $_SESSION['ativadoUsuario'] = $resultado['ativado'];
                $_SESSION['dataCriacaoUsuario'] = $resultado['datacriacao'];
                $_SESSION['dataExclusaoUsuario'] = $resultado['dataexclusao'];
                $_SESSION["tempo"] = time() + 600;
                if(!isset($_SESSION)){
                    session_start();
                }
                try {
                    if ($this->alterar("usuario", "logado = 1", $resultado['id'])) {
                    }
                } catch (Exception $e) {
                    return "Exceção capturada: " . $e->getMessage();

                }

                if ($tela == "login" && $_SESSION['nivelUsuario'] > 1) {
                    header('Location: ../view/index.php');
                    session_name("loginUsuario");
                }else{
                    header('Location: ../view/indexDashComum.php');
                    session_name("loginUsuarioComum");
                }
                if ($tela == "lockscreen" && $_SESSION['nivelUsuario'] > 1) {
                    session_name("loginUsuario");
                    header('Location: ../view/dashboard.php');
                }
                exit();
            } else {
                return "Dados não conferem";
            }
        } else {
            return "Usuario não encontrado";
        }
    }

    function deslogar() {
        session_start();
            $campos_eq_valores = "logado = 0";
            try {
                if ($this->alterar("usuario", $campos_eq_valores, $_SESSION['idUsuario'])) {

                    session_destroy();
                }
            } catch (Exception $e) {
                return "Exceção capturada: " . $e->getMessage();
            }
            header('Location: ../view/login.php');
        exit;
    }

    function cadastrarUsuario()
    {
        try {
            $this->tabela = "usuario";
            $this->campos = array("nome", "email", "login", "senha", "imagem", "nivel","datacriacao");
            $this->valores = array($this->getNome(), $this->getEmail(), $this->getLogin(),
                $this->getSenha(), $this->getImagem(), $this->getNivel(), date("Y-m-d"));

            return $this->cadastrar();
        } catch (Exception $e) {
            echo "Exceção capturada: " . $e->getMessage();
            return null;
        }

    }

    function alterarUsuario()
    {
        if ($this->imagem != null or $this->imagem != "") {
            $campos_eq_valores = "nome = '$this->nome', nivel='$this->nivel', email = '$this->email', login = '$this->login', senha = '$this->senha', imagem = '$this->imagem'";
        } else {
            $campos_eq_valores = "nome = '$this->nome', nivel='$this->nivel', email = '$this->email', login = '$this->login', senha = '$this->senha'";
        }
        try {
            if ($this->alterar("usuario", $campos_eq_valores, $this->id)) {
                session_start();
                return true;
            }
        } catch (Exception $e) {
            return "Exceção capturada: " . $e->getMessage();

        }
    }

    function excluirUsuario($id)
    {
        try {
            return $this->delete("usuario", "ativado = 0, dataexclusao=". date('Y-m-d'), "id=$id");
        } catch (Exception $e) {
            echo "Exceção capturada: " . $e->getMessage();
            return null;
        }
    }



    
    function listarUsuario()
    {
        $this->tabela = "usuario";
        $this->campos = array("id", "nome", "email", "login", "senha", "nivel", "imagem");
        $this->condicao = "ativado = 1";
        $this->subQntColunasConsulTabela = 3;
        $this->listar();
    }

    function pesquisarUsuario()
    {

    }

    function retornaAlgoUsuario($campo_sql, $id_usuario)
    {
        $sql = "select * from usuario where ativado = 1 and id = $id_usuario";
        $query = $this->query($sql);
        $r = mysqli_fetch_array($query, MYSQLI_ASSOC);
        return $r[$campo_sql];
    }

}