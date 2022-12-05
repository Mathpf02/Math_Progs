<?php
function getChave($tipo){
    switch($tipo){
        case "alunos":
            return"matricula";
        case "professores":
            return "codigo";
        default:
            return null;
    }
}