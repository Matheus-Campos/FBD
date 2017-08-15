<?php
require_once "conexao.php";
$nome=$_POST['pessoa-nome'];
$endereco=$_POST['pessoa-nome'];
$tipo=$_POST['pessoa-tipo'];
$telefone=$_POST['pessoa-telefone'];
$especialidade=$_POST['pessoa-especialidade'];
$sql = mysqli_query($con,"INSERT INTO PESSOA(COD_PESSOA, NOME, ENDERECO, TIPO, ESPECIALIDADE, TELEFONE) VALUES (null,$nome,$endereco,$tipo,$telefone,$especialidade)");
?>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <title>addpessoa.php</title>
  </head>
  <body>
    <h3 class="text-success text-center">Boa garoto</h3>
    <a href="index.php"><button type="button" class="btn btn-success" >Voltar</button></a>
  </body>
</html>
