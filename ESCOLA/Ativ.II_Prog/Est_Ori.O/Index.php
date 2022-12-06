<?php



class Pessoa{
//Atributo
 public $nome;

 
 public function Usuario(){
    echo "Pessoa: ".$this->nome. "<br><br>"; 
 }
}
//Objeto
$nome = new Pessoa();
//Atributo
$nome->nome ="Pedro Silva";
$nome->Usuario();









class Aluno{
//Atributo
 public $nome;
 public $nome2;
 public $matricula;
 public $matricula2;
 public $nota;
 public $nota2;

 //método

   public function Diciplina(){
    echo "Alunos: <br>". $this->matricula. " - " .$this->nome. " : " .$this->nota."<br>";
    echo $this->matricula2. " - " .$this->nome2. " : " .$this->nota2."<br><br>";

   }
}


//Uso de atributos anteriores
class Disciplina extends Aluno{

    public $discp = "Progrmação III";
    public function Aula(){
        echo "Disciplina: ".$this->discp."<br>";
        echo "Alunos Matriculados: <br>". $this->matricula. " - " .$this->nome. " : " .$this->nota."<br>";
        echo $this->matricula2. " - " .$this->nome2. " : " .$this->nota2."<br>";

    }

}


$alunos = new Aluno();
$alunos->nome = "Maria Silva";
$alunos->nome2 = "Paulo Silva";
$alunos->matricula = 2022321011;
$alunos->matricula2 = 2022321111;
$alunos->nota = 8.5;
$alunos->nota2 = 6.7;
$alunos->Diciplina();


$aula = new Disciplina();
$aula->nome = "Maria Silva";
$aula->nome2 = "Paulo Silva";
$aula->matricula = 2022321011;
$aula->matricula2 = 2022321111;
$aula->nota = 8.5;
$aula->nota2 = 6.7;
$aula->Aula();
