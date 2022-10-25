<?php
$server ="localhost";
$user ="root";
$pass ="";
$bd ="prog_ii";
$tab ="usuario";
 
if ( $con = mysqli_connect($server, $user, $pass, $bd )){
    echo"CONECTADO!";
}else{
    echo"ERRO!";
}

?>