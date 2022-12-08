<?php
session_start();
include "conecta.php";

$id=$_SESSION['matricula'];
$sql= "DELETE FROM cad_code WHERE matricula=$id";
$resultado= mysqli_query($conexao, $sql);

mysqli_close($conexao);

if ($resultado){
        header('Location: ../login.php');
}
?>
</body>
</html>