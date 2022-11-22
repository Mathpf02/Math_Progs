<?php

class Usuario
{
    private $id;
    private $nome;
    private $email;
    private $img;
    private $tel;
    private $senha;
    public $pdo;
    public function __construct()
    {
        require_once 'conect.php';
        $this->pdo = $pdo;
    }
    public function setId($id): void
    {
        $this->id = $id;
    }
    public function getId(): int
    {
        return $this->id;
    }
    public function getTel($id, $reduce = false): string
    {
        $sql_ = $this->pdo->query('SELECT telefone FROM usuarios WHERE id=' . $id)->fetch_assoc();
        if (strlen($sql_['telefone']) > 50 && $reduce) {
            $telefone = substr($sql_['telefone'], 0, 50) . '...';
        } else {
            $telefone = $sql_['telefone'];
        }
        return  $telefone;
    }
    public function getNome($id, $reduce = false): string
    {
        $sql_ = $this->pdo->query('SELECT nome FROM usuarios WHERE id=' . $id)->fetch_assoc();
        if (strlen($sql_['nome']) > 50 && $reduce) {
            $nome = substr($sql_['nome'], 0, 50) . '...';
        } else {
            $nome = $sql_['nome'];
        }
        return $this->nome = $nome;
    }
    public function getEmail($id, $reduce = false): string
    {
        $sql_ = $this->pdo->query('SELECT email FROM usuarios WHERE id=' . $id)->fetch_assoc();
        if (strlen($sql_['email']) > 50 && $reduce) {
            $email = substr($sql_['email'], 0, 50) . '...';
        } else {
            $email = $sql_['email'];
        }
        return  $email;
    }
    public function getImg($id): string
    {
        $sql_ = $this->pdo->query('SELECT img FROM usuarios WHERE id=' . $id)->fetch_assoc();
        return $sql_['img'];
    }
    public function setUser()
    {
        if (!is_null($this->id) && $this->verify_login()) {
            $sql_ = $this->pdo->query("SELECT * FROM usuarios WHERE id=$this->id");
            if ($sql_) {
                $assoc_u = $sql_->fetch_assoc();
                $this->nome = $assoc_u['nome'];
                $this->email = $assoc_u['email'];
                $this->img = $assoc_u['img'];
                $this->tel = $assoc_u['telefone'];
            }
        }
    }
    public function creat_user($nome, $email, $telefone, $imagem, $senha): bool
    {
        if (is_null($nome) || is_null($email) || is_null($telefone) || is_null($imagem) || is_null($senha)) {
            $_SESSION['error'] = true;
            $_SESSION['mensagem'] = 'Campo obrigatório faltando.';
            return false;
        } else {
            $erro = false;
            foreach ($this->users_all() as $aux) {
                if ($aux['email'] == $email) {
                    $_SESSION['error'] = true;
                    $_SESSION['mensagem'] = 'O email já existe.';
                    $erro = true;
                    break;
                }
            }
            if (!$erro) {
                $sql_ = $this->pdo->query("INSERT INTO usuarios(nome, email, telefone, img, senha) VALUES ('$nome', '$email', '$telefone', '$imagem', '$senha')");
                if ($sql_) {
                    $_SESSION['error'] = false;
                    $_SESSION['mensagem'] = 'Bem vindo a DVP.';
                    return true;
                }
            } else {
                $_SESSION['error'] = true;
                $_SESSION['mensagem'] = 'esse email já foi cadastrado.';
                return false;
            }
        }
    }

    public function login($email, $senha): bool
    {
        $email_ = $this->pdo->escape_string($email);
        $sql_  = $this->pdo->query("SELECT * FROM usuarios WHERE email='$email_'")->fetch_assoc();
        if (is_null($sql_)) {
            $_SESSION['error'] = true;
            $_SESSION['mensagem'] = 'O usuário informado não existe. <a href=\'paginas/cadastrar_se.php\' class=\'minha_senha_a\'>Cadastre-se.</a>';
            return false;
        } else {
            if (password_verify($senha, $sql_['senha'])) {
                $_SESSION['id_user_'] = $sql_['id'];
                return true;
            } else {
                $_SESSION['error'] = true;
                $_SESSION['mensagem'] = 'Senha incorreta.';
                return false;
            }
        }
    }
    public function logout(): bool
    {
        return session_destroy();
    }
    public function verify_login()
    {
        if (isset($_SESSION['id_user_'])) {
            return true;
        } else {
            return false;
        }
    }
    private function user_sessio_all()
    {
        $sql_ = $this->pdo->query("SELECT * FROM usuarios WHERE id=" . $_SESSION['id_user_'])->fetch_assoc();
        return $sql_;
    }
    private function users_all()
    {
        $sql_ = $this->pdo->query("SELECT * FROM usuarios")->fetch_all(1);
        return $sql_;
    }
    public function user_edit($nome, $senha, $senha_atual, $email, $telefone, $imagem): bool
    {
        $user_ = $this->user_sessio_all();
        $id = $user_['id'];
        if ($nome == null or $nome == '') {
            $nome = $user_['nome'];
        }
        if ($senha == null or $senha == '') {
            $senha = $user_['senha'];
        } elseif (!(password_verify($senha_atual, $user_['senha']))) {
            $_SESSION['mensagem'] = "Senha incorreta.";
            $_SESSION['error'] = true;
            return false;
        } else {
            $senha = password_hash($senha, PASSWORD_DEFAULT);
        }
        if ($email == null or $email == '') {
            $email = $user_['email'];
        } else {
            $emails = $this->users_all();
            $igual = false;
            foreach($emails as $v) {
                if($v['email'] == $email and $user_['email'] != $email) {
                    $igual = true;
                }
            }
            if($igual) {
                $_SESSION['error'] = true;
                $_SESSION['mensagem'] = "O email solicitado já esta sendo usado.";
                return false;
            }
        }
        if ($telefone == null or $telefone == '') {
            $telefone = $user_['telefone'];
        }
        if ($imagem == null or $imagem == '') {
            $imagem = $user_['img'];
        }
        $sql_up = $this->pdo->query("UPDATE usuarios SET `nome`='$nome',`email`='$email',`senha`='$senha',`img`='$imagem',`telefone`='$telefone' WHERE id=" . $id);
        if ($sql_up) {
            $_SESSION['error'] = false;
            $_SESSION['mensagem'] = "Conta atualizada com sucesso.";
            return true;
        } else {
            $_SESSION['error'] = true;
            $_SESSION['mensagem'] = "Erro ao atualizar a conta.";
            return false;
        }
    }
    public function remove_user(): bool
    {
        $sql_ = $this->pdo->query("DELETE FROM usuarios WHERE id=" . $_SESSION['id_user_']);
        if ($sql_) {
            $_SESSION['error'] = true;
            $_SESSION['mensagem'] = "Conta deletada com sucesso!";
            return true;
        } else {
            $_SESSION['error'] = true;
            $_SESSION['mensagem'] = "Não foi possivel deletar a conta.";
            return false;
        }
    }
}
