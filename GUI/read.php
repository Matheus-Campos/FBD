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
    <h2 class="text-primary text-center collapsable">TABELA PESSOA</h2>
    <div>
      <?php
      $result = $con->query('SELECT * FROM PESSOA ORDER BY NOME ASC');
      if($result){?>
        <div class="table-responsive">
          <table class="table table-bordered table-striped table-hover">
            <tr><th>Código</th><th>Nome</th><th>Endereço</th><th>Tipo</th><th>Especialidade</th><th>Telefone</th></tr>
           <?php while ($row = $result->fetch_assoc()){?>
               <tr><td><?php echo $row['COD_PESSOA']; ?></td><td><?php echo $row['NOME']; ?></td><td><?php echo $row['ENDERECO']; ?></td><td><?php echo $row['TIPO']; ?></td><td><?php echo $row['ESPECIALIDADE']; ?></td><td><?php echo $row['TELEFONE']; ?></td><td><a class='sem-sublinhado' href='update.php'><button class='btn btn-info btn-block'>UPDATE</button></a></td><td><a class='sem-sublinhado' href='delete.php'><button class='btn btn-danger btn-block'>DELETE</button></a></td></tr>
           <?php }
           $result->free(); ?>
           </table>
         </div>
        <?php } ?>
    </div>
    <h2 class="text-primary text-center collapsable">TABELA VEÍCULO</h2>
    <div>
      <?php
      $result = $con->query('SELECT * FROM VEICULO');
      if($result){?>
        <div class="table-responsive">
          <table class="table table-bordered table-striped table-hover">
            <tr><th>Chassi</th><th>Marca</th><th>Pessoa (ID)</th></tr>
           <?php while ($row = $result->fetch_assoc()){?>
               <tr><td><?php echo $row['CHASSI']; ?></td><td><?php echo $row['MARCA']; ?></td><td><?php echo $row['COD_PESSOA']; ?></td><td><a class="sem-sublinhado" href="update.php"><button class='btn btn-info btn-block'>UPDATE</button></a></td><td><a class='sem-sublinhado' href="delete.php"><button class='btn btn-danger btn-block'>DELETAR</button></a></td></tr>
           <?php }
           $result->free(); ?>
           </table>
         </div>
        <?php } ?>
    </div>
    <script type="text/javascript" src="js/jquery-3.2.1.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
  </body>
</html>
