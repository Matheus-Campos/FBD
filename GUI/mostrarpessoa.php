<?php
require_once 'conexao.php';
?>
<html>
  <head>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <meta charset="utf-8">
    <title>Show results</title>
  </head>
  <body>
    <?php
    $result = $con->query('SELECT * FROM PESSOA');
    if($result){?>
      <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
          <tr><th>Código</th><th>Nome</th><th>Endereço</th><th>Tipo</th></tr>
         <?php while ($row = $result->fetch_assoc()){?>
             <tr><td><?php echo $row['COD_PESSOA']; ?></td><td><?php echo $row['NOME']; ?></td><td><?php echo $row['ENDERECO']; ?></td><td><?php echo $row['TIPO']; ?></td></tr>
         <?php }
         $result->free(); ?>
         </table>
       </div>
      <?php } ?>
  </body>
</html>
