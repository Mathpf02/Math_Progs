<?php

class calculo
{
    private $altu;
    private $larg;

    public function __construct()
    {
        $this->altura = 1;
        $this->largura = 1;
    }
    public function setLargura($larg)
    {
        if ($larg >= 20 && $larg <= 0) {
            $this->altura = $larg;
        }
    }
    public function __toString() : string
    {
        
    }
}
