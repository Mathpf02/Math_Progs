 <?php
    include('proc_login');
    if ( isset ($_POST['matricula']) || isset ($_POST['senha'])){

        if (strlen ($_POST['matricula']) == 0){
            echo "Preencha sua matrícula";
        }elseif(strlen ($_POST['senha']) == 0){
            echo "Preencha sua senha";
        }else{
            $matricula = $conect_banc -> real_escape_string($_POST['matricula']);
            $senha = $conect_banc -> real_escape_string($_POST['senha']);

            $sql_code = "SELECT * FROM cadastro WHERE matricula ='$matricula' AND senha ='$senha' ";
            $sql_query = $conect_banc -> query($sql_code) or die("Falha na execução do código SQL". $conect_banc->error);

            $quantidade = $sql_query->num_rows;


            if($quantidade == 1){
                $usuario = $sql_query->fetch_assoc();

                if(isset($_SESSION)) {
                    session_start();
                }

                $_SESSION["matricula"] = $usuario['matricula'];
                $_SESSION["nome"] = $usuario['nome'];     
                
                header("Location: painel.php");
            }else{
                echo "Falha ao logar!! Dados incorretos.";
            }
        }

    }
    ?>


 <!DOCTYPE html>
 <html lang="pt-br">

 <head>
     <meta charset="UTF-8">
     <title>CoDe-Cadastro</title>
 </head>

 <body>
     <h1> CoDe</h1>
     <h3>Sistema de Cadastro</h3>

     <form name="cad_Usuario" method="POST" action=" ">
         <label> Matricula: </label>
         <input type="text" name="matricula" placeholder="Matricula"><br><br>
         <label> Senha: </label>
         <input type="text" name="senha" placeholder="Senha"><br><br>

         <input type="submit" value="ENTRAR">
     </form>
 </body>

 </html>