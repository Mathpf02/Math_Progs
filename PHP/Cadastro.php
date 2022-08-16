 <?php
    include('proc_cadastro');
    if ( isset ($_POST['matricula']) || isset ($_POST['nome']) || isset ($_POST['email']) || 
       isset ($_POST['curso']) || isset ($_POST['fone']) || isset ($_POST['senha'])){

        if (strlen ($_POST['matricula']) == 0){
            echo "Preencha sua matrícula";
        }else if(strlen ($_POST['nome']) == 0){
            echo "Preencha seu nome";
        }elseif(strlen ($_POST['email']) == 0){
            echo "Preencha seu e-mail";
        }elseif(strlen ($_POST['fone']) == 0){
            echo "Preencha seu telefone";
        }elseif(strlen ($_POST['senha']) == 0){
            echo "Preencha sua senha";
        }else{
            $matricula = $conect_banc -> real_escape_string($_POST['matricula']);
            $nome = $conect_banc -> real_escape_string($_POST['nome']);
            $email = $conect_banc -> real_escape_string($_POST['email']);
            $fone = $conect_banc -> real_escape_string($_POST['fone']);
            $senha = $conect_banc -> real_escape_string($_POST['senha']);

            $sql_code = "SELECT * FROM cadastro WHERE matricula ='$matricula', nome ='$nome', email ='$email', fone ='$fone' AND senha ='$senha' ";
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
     <h1> DADOS DE CADASTRO </h1>

     <form name="cad_Usuario" method="POST" action=" ">
         <label> Matricula: </label>
         <input type="text" name="matricula" placeholder="Matricula"><br><br>

         <label> Nome: </label>
         <input type="text" name="nome" placeholder="Nome Completo"><br><br>

         <label> E-mail: </label>
         <input type="text" name="email" placeholder="Seu-mail"><br><br>

         <label> Curso: </label>
         <input type="text" name="curso" placeholder="INFO, ADM ou MSI"><br><br>

         <label> Telefone: </label>
         <input type="text" name="fone" placeholder=" (**) * ****-****"><br><br>

         <label> Senha: </label>
         <input type="text" name="senha" placeholder="Senha"><br><br>

         <input type="reset" value="CANCELAR">
         <input type="submit" value="CADASTRAR">
     </form>
 </body>

 </html>