<?php

require_once 'pdo.php';
$resultado= $pdo-> query('SELECT * FROM demonios');
$linhas= $resultado->fetchAll();
foreach($linhas as $linha){ 
?>
    <tr>
    <td> <a href="\form.php?matricula<?=$linha['matricula']?> "><?=$linha['matricula']?></a></td>
    <td><?=$linha['nome']?></td>
     <td> <a href="\delete.php?matricula=<?=$linha['matricula']?>"> DELETAR</a></td>
    </tr>

<?php

}



?>

