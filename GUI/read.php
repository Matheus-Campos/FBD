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
    <h1 class="text-primary text-center" onclick="window.location = 'index.html';">Oficina Esquema5</h1>
    <h2 class="text-primary text-center collapsable">TABELA PESSOA</h2>
    <div>
      <?php
      $result = $con->query('SELECT * FROM PESSOA ORDER BY NOME ASC');
      if($result){?>
        <div class="table-responsive">
          <table class="table table-bordered table-striped table-hover">
            <tr><th>Código</th><th>Nome</th><th>Endereço</th><th>Tipo</th><th>Especialidade</th><th>Telefone</th></tr>
           <?php while ($row = $result->fetch_assoc()){
             $action_update = "?update=pessoa-".$row['COD_PESSOA'];
             $action_delete = "?delete=pessoa-".$row['COD_PESSOA'];?>
               <tr>
                 <td><?php echo $row['COD_PESSOA']; ?></td><td><?php echo $row['NOME']; ?></td>
                 <td><?php echo $row['ENDERECO']; ?></td>
                 <td><?php echo $row['TIPO']; ?></td>
                 <td><?php echo $row['ESPECIALIDADE']; ?></td>
                 <td><?php echo $row['TELEFONE']; ?></td>
                 <td><form <?php echo "action='".$action_update."'"; ?> method="post">
                   <input type="submit" class="btn btn-info btn-block" value="UPDATE">
                 </form></td>
                 <td><form <?php echo "action='".$action_delete."'"; ?> method="post">
                   <input type="submit" class="btn btn-danger btn-block" value="DELETE">
                 </form></td>
               </tr>
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
           <?php while ($row = $result->fetch_assoc()){
             $action_update = "?update=veiculo-".$row['CHASSI'];
             $action_delete = "?delete=veiculo-".$row['CHASSI'];?>
               <tr>
                 <td><?php echo $row['CHASSI']; ?></td>
                 <td><?php echo $row['MARCA']; ?></td>
                 <td><?php echo $row['COD_PESSOA']; ?></td>
                 <td><form <?php echo "action='".$action_update."'"; ?> method="post">
                   <input type="submit" class="btn btn-info btn-block" value="UPDATE">
                 </form></td>
                 <td><form <?php echo "action='".$action_delete."'"; ?> method="post">
                   <input type="submit" class="btn btn-danger btn-block" value="DELETE">
                 </form></td>
               </tr>
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
