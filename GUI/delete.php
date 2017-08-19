<?php
  require_once 'conexao.php';

  if ($_GET['tabela']=='pessoa') {
    mysqli_query($con, "DELETE FROM PESSOA WHERE COD_PESSOA = '".$_GET['id']."'");
  } else if ($_GET['tabela']=='veiculo') {
    mysqli_query($con, "DELETE FROM VEICULO WHERE CHASSI = '".$_GET['id']."'");
  } else if ($_GET['tabela']=='os') {
    mysqli_query($con, "DELETE FROM ORDEM_SERVICO WHERE NUMERO_OS = '".$_GET['id']."'");
  } else if ($_GET['tabela']=='item') {
    mysqli_query($con, "DELETE FROM ITEM WHERE COD_ITEM = '".$_GET['id']."'");
  } else if ($_GET['tabela']=='equipe') {
    mysqli_query($con, "DELETE FROM EQUIPE WHERE ID_EQUIPE = '".$_GET['id']."'");
  } else if ($_GET['tabela']=='pertence') {
    mysqli_query($con, "DELETE FROM PERTENCE WHERE ID_EQUIPE = '".$_GET['id1']."' AND COD_PESSOA = '".$_GET['id2']."'")
  } else if ($_GET['tabela']=='demanda') {
    mysqli_query($con, "DELETE FROM DEMANDA WHERE COD_ITEM_PECA = '".$_GET['id1']."' AND COD_ITEM_SERVICO = '".$_GET['id2']."'")
  }
?>
<html>
  <head>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <meta charset="utf-8">
    <title>Deleted!</title>
  </head>
  <body>
    <h1 class="text-primary text-center" onclick="window.location = 'read.php';">Oficina Esquema5</h1>
  </body>
</html>
