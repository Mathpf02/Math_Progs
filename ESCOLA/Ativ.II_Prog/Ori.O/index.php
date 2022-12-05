<?php
require_once "Conta.php";

$cont_Math = new Conta();
$cont_Math->ident = 1245;
$cont_Math->agenc = 327;

$cont_Fran = new Conta();
$cont_Fran->ident = 1345;
$cont_Fran->agenc = 327;

var_dump($cont_Math);
var_dump($cont_Fran);

$cont_Fran->depositar(60);
echo "Valor da conta do Francisco:" .$cont_Fran->getSaldo();
