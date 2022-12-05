<?php

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


