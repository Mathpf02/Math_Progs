<?php
/*
class pessoa{
//Atributos
    public $nome;
    public $idade;
    public $sexo;

//Métodos
    public function Falar(){
        echo $this->nome." de ".$this->idade." anos, acabou de falar!";
    }
}
//Matheus = Objeto
$Matheus = new Pessoa();
//Acessar atributo
$Matheus->nome = "Matheus Pinto da Fontoura"; 
$Matheus->idade = 19; 
$Matheus->sexo = "Masculino"; 
$Matheus->Falar();

*/

class Login{
    public $email;
    private $senha;
    public function __construct($email, $senha, $nome){
        $this->nome = $nome;
        $this->setEmail($email);
        $this->setSenha($senha);

    }
    public function getNome(){
        return $this->nome;
    }

//Pegar valor indicado fora da classe
    public function getSenha(){
        return $this->senha;
    }
//Passar dados por parametro
    public function setSenha($s){
        $this->senha = $s;

    }

//Pegar valor indicado fora da classe
    public function getEmail(){
        return $this->email;
    }
//Passar dados por parametro
    public function setEmail($e){
        $email=  filter_var($e, FILTER_SANITIZE_EMAIL);
        $this->email = $e;

    }

    public function Logar(){
        if($this->email == "teste@teste.com" and $this->senha == "12345"){
            echo "Logado com sucesso!";
        }else{
            echo "Dados invalidos!";
        }
    }
}
$logar = new Login("teste@teste.com", "12345", "Matheus Fontoura");
$logar->Logar();
echo "<br>";
echo $logar->getNome();