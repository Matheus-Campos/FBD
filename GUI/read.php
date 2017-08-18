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
             $action_update = "update.php?tabela=pessoa&id=".$row['COD_PESSOA'];
             $action_delete = "delete.php?tabela=pessoa&id=".$row['COD_PESSOA'];?>
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
    <h2 class="text-primary text-center collapsable">TABELA ORDEM DE SERVIÇO</h2>
    <div>
      <?php
      $result = $con->query('SELECT * FROM ORDEM_SERVICO');
      if($result){?>
        <div class="table-responsive">
          <table class="table table-bordered table-striped table-hover">
            <tr><th>Número de Ordem</th><th>Chassi</th><th>Data de Emissão</th><th>Data de Conclusão</th><th>Código da Equipe</th></tr>
           <?php while ($row = $result->fetch_assoc()){
             #As 2 chaves são primárias
             $action_update = "?update=os-".$row['NUMERO_OS'];
             $action_delete = "?delete=os-".$row['NUMERO_OS'];?>
               <tr>
                 <td><?php echo $row['NUMERO_OS']; ?></td>
                 <td><?php echo $row['CHASSI']; ?></td>
                 <td><?php echo $row['DATA_EMISSAO']; ?></td>
                 <td><?php echo $row['DATA_CONCLUSAO']; ?></td>
                 <td><?php echo $row['ID_EQUIPE']; ?></td>
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
    <h2 class="text-primary text-center collapsable">TABELA ITEM</h2>
    <div>
      <?php
      $result = $con->query('SELECT * FROM ITEM');
      if($result){?>
        <div class="table-responsive">
          <table class="table table-bordered table-striped table-hover">
            <tr><th>Código do Item</th><th>Descrição</th><th>Número de Ordem</th><th>Chassi</th></tr>
           <?php while ($row = $result->fetch_assoc()){
             $action_update = "?update=item-".$row['COD_ITEM'];
             $action_delete = "?delete=item-".$row['COD_ITEM'];?>
               <tr>
                 <td><?php echo $row['COD_ITEM']; ?></td>
                 <td><?php echo $row['DESCRICAO']; ?></td>
                 <td><?php echo $row['NUM_OS']; ?></td>
                 <td><?php echo $row['CHASSI']; ?></td>
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
    <h2 class="text-primary text-center collapsable">TABELA PEÇA</h2>
    <div>
      <?php
      $result = $con->query('SELECT * FROM PECA');
      if($result){?>
        <div class="table-responsive">
          <table class="table table-bordered table-striped table-hover">
            <tr><th>Código da Peça</th><th>Fornecedor</th></tr>
           <?php while ($row = $result->fetch_assoc()){
             $action_update = "?update=peca-".$row['COD_PECA'];
             $action_delete = "?delete=peca-".$row['COD_PECA'];?>
               <tr>
                 <td><?php echo $row['COD_PECA']; ?></td>
                 <td><?php echo $row['FORNECEDOR']; ?></td>
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
    <h2 class="text-primary text-center collapsable">TABELA SERVIÇO</h2>
    <div>
      <?php
      $result = $con->query('SELECT * FROM SERVICO');
      if($result){?>
        <div class="table-responsive">
          <table class="table table-bordered table-striped table-hover">
            <tr><th>Código do Serviço</th><th>Garantia/ano</th></tr>
           <?php while ($row = $result->fetch_assoc()){
             $action_update = "?update=servico-".$row['COD_SERVICO'];
             $action_delete = "?delete=servico-".$row['COD_SERVICO'];?>
               <tr>
                 <td><?php echo $row['COD_SERVICO']; ?></td>
                 <td><?php echo $row['GARANTIA']; ?></td>
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
    <h2 class="text-primary text-center collapsable">TABELA DEMANDA</h2>
    <div>
      <?php
      $result = $con->query('SELECT * FROM DEMANDA');
      if($result){?>
        <div class="table-responsive">
          <table class="table table-bordered table-striped table-hover">
            <tr><th>Código da Peça</th><th>Código do Serviço</th></tr>
           <?php while ($row = $result->fetch_assoc()){
             #As 2 chaves são primárias
             $action_update = "?update=demanda-".$row['COD_ITEM_PECA']."-".$row['COD_ITEM_SERVICO'];
             $action_delete = "?delete=demanda-".$row['COD_ITEM_PECA']."-".$row['COD_ITEM_SERVICO'];?>
               <tr>
                 <td><?php echo $row['COD_ITEM_PECA']; ?></td>
                 <td><?php echo $row['COD_ITEM_SERVICO']; ?></td>
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

    <h2 class="text-primary text-center collapsable">TABELA EQUIPE</h2>
    <div>
      <?php
      $result = $con->query('SELECT * FROM EQUIPE');
      if($result){?>
        <div class="table-responsive">
          <table class="table table-bordered table-striped table-hover">
            <tr><th>Código da Equipe</th><th>Nome da Equipe</th></tr>
           <?php while ($row = $result->fetch_assoc()){
             $action_update = "?update=equipe-".$row['ID_EQUIPE'];
             $action_delete = "?delete=equipe-".$row['ID_EQUIPE'];?>
               <tr>
                 <td><?php echo $row['ID_EQUIPE']; ?></td>
                 <td><?php echo $row['NOME']; ?></td>
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
    <h2 class="text-primary text-center collapsable">TABELA PERTENCE</h2>
    <div>
      <?php
      $result = $con->query('SELECT * FROM PERTENCE');
      if($result){?>
        <div class="table-responsive">
          <table class="table table-bordered table-striped table-hover">
            <tr><th>Código da Equipe</th><th>Código do mecânico</th></tr>
           <?php while ($row = $result->fetch_assoc()){
             $action_update = "?update=pertence-".$row['ID_EQUIPE']."-".$row['COD_PESSOA'];
             $action_delete = "?delete=pertence-".$row['ID_EQUIPE']."-".$row['COD_PESSOA'];?>
               <tr>
                 <td><?php echo $row['ID_EQUIPE']; ?></td>
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
