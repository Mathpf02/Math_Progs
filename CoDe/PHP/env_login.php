<?php

if(print_r($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha'])){

    //acesso
    include('conexao.php');
    $Email = $_POST['email'];
    $Senha = $_POST['senha'];


    $sql = "SELECT*FROM cad_code WHERE email= '$Email' and senha= '$Senha'";
    $result = $conexao->query($sql);
   
    if(mysqli_num_rows($result) < 1){
        $_SESSION['email'] = $Email;
        $_SESSION['senha'] = $Senha;
        header('Location: login.php');
    }else{
        $_SESSION['email'] = $Email;
        $_SESSION['senha'] = $Senha;
        header('Location: Inicio.php');
    }


}else{
    header('Location: login.php');
}
