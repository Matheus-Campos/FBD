<?php
require_once 'conexao.php';
?>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Esquema5</title>
  </head>
  <body>
    <div class="container-fluid">
      <h1 class="text-primary text-center">Olá mundo!</h1>
      <div class="well">
        <div class="pessoa">
          <form action="addpessoa.php" method="post">
            <input type="text" name="pessoa-nome" placeholder="Ex: Filipe">
            <input type="text" name="pessoa-endereco" placeholder="Ex: Rua Mamanguape, 69">
            <input type="radio" name="pessoa-tipo" value="Mecânico">
            <input type="radio" name="pessoa-tipo" value="Cliente">
            <input type="number" id="pessoa-telefone" name="pessoa-telefone" placeholder="40028922">
            <input type="text" id="pessoa-especialidade" name="pessoa-especialidade" value="Motor">
            <input type="submit" value="Submeter">
          </form>
        </div>
      </div>
    </div>
    <script type="text/javascript" src="js/jquery-3.2.1.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
  </body>
</html>
