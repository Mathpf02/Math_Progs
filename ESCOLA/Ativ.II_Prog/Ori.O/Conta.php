<?php

class Conta
{
    private $saldo;
    public $ident;
    private $senha;
    public $agenc;

public function _construct(){
    $this->saldo=0;
}

    public function getSaldo()
    {
        return $this->saldo;
    }
    public function depositar($valor)
    {
        if ($valor >= 0) {
            $this->saldo = $this->saldo + $valor;
        }
    }
}
