<?php
require_once 'conexao.php';
$result = $con->query('SELECT * FROM PESSOA');
if($result){
   while ($row = $result->fetch_assoc()){
       echo '<table border="5"><tr>';
       echo "<td><label>Código: </label>" . $row["COD_PESSOA"]."</td>" ;
       echo "<td><label>Nome: </label>" . $row["NOME"]. "</td>" ;
       echo "<td><label>Tipo: </label>" . $row["TIPO"]. "</td>" ;
       echo "<td><label>Endereço: </label>" . $row["ENDERECO"]. "</td>" ;
       echo '</tr></table>';
   }
   $result->free();
}
?>
