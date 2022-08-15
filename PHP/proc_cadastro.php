<?php
$host ="localhost";
$user = "root";
$dbname = "";
$port = "3306";

//Conexão com a porta
$conet = new PDO("mysql: host= $host; port= $port; dbname= $dbname, $user, $pass ");

/*Conexão sem a porta
$conet = new PDO("mysql: host= $host; dbname= $dbname, $user, $pass ");
*/
?>