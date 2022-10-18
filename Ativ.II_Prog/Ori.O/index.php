<?php
require_once "Conta.php";

$cont_Math = new Conta ();
$cont_Math -> saldo = 1.0;
$cont_Math -> ident = 1245;
$cont_Math -> senha = 15110;
$cont_Math -> agenc = 327;

$cont_Fran = new Conta ();
$cont_Fran -> saldo = 100000.0;
$cont_Fran -> ident = 1345;
$cont_Fran -> senha = 17022;
$cont_Fran -> agenc = 327;

var_dump ($cont_Math);
var_dump ($cont_Fran)
;






?>
