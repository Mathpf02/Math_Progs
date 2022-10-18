<?

$server ="localhost";
$user ="root";
$pass =" ";
$db ="prog_ii";
$tab ="usuario";
 
if ( mysqli_connect($server, $user, $pass, $db )){
    echo"CONECTADO!";
}else{
    echo"ERRO";
}

?>
