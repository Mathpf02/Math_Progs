<?php
$host ="localhost";
$user = "root";
$password = "";
$database = "cadastro";

//Conexão com a porta
$conect_banc = new mysqli( $host, $user, $password, $database);

if ($conect_banc -> error){
    die("Falha de conecxão !!". $conect_banc->error);
}

?>