<?php
require_once 'conexao.php';
?>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Esquema5</title>
  </head>
  <body>
    <div class="container-fluid">
      <a href="http://localhost/FDB/GUI"><h1 class="text-primary text-center">Oficina Esquema5</h1></a>
      <div class="row">
        <div class="col-md-4">
          <div class="pessoa">
            <div class="botao btn btn-primary btn-block">
              Adicionar pessoa
            </div>
            <div>
              <form action="?add=pessoa" method="post">
                <div class="form-group">
                  <label for="pessoa-nome">Nome:</label>
                  <input type="text" class="form-control" name="pessoa-nome" maxlength="20" placeholder="Ex: Filipe" required>
                </div>
                <div class="form-group">
                  <label for="pessoa-endereco">Endereço:</label>
                  <input type="text" class="form-control" name="pessoa-endereco" maxlength="255" placeholder="Ex: Rua Mamanguape, 69" required>
                </div>
                <div class="form-group">
                  <label for="pessoa-tipo">Tipo:</label>
                  <select class="form-control" name="pessoa-tipo" id="pessoa-tipo">
                    <option selected>Mecânico</option>
                    <option>Cliente</option>
                  </select>
                </div>
                <div class="form-group" id="pessoa-telefone">
                  <label for="pessoa-telefone">Telefone:</label>
                  <input type="number" class="form-control" name="pessoa-telefone" placeholder="40028922">
                </div>
                <div class="form-group" id="pessoa-especialidade">
                  <label for="pessoa-especialidade">Especialidade:</label>
                  <input type="text" class="form-control" maxlength="20" name="pessoa-especialidade" placeholder="Motor">
                </div>
                <input type="submit" class="btn btn-default btn-block" value="Submeter">
              </form>
            </div>
            <div class="botao btn btn-primary btn-block">
              Mostrar pessoa
            </div>
            <div>
              <form action="mostrarpessoa.php" method="post">
                <input type="submit" class="btn btn-default btn-block" value="Submeter">
              </form>
            </div>
        </div>
        </div>
        <div class="col-md-4">
          <div class="veiculo">
            <div class="botao btn btn-primary btn-block">
              Adicionar veículo
            </div>
            <div>
              <form action="?add=veiculo" method="post">
                <div class="form-group">
                  <label for="veiculo-chassi">Chassi:</label>
                  <input type="text" class="form-control" name="veiculo-chassi" placeholder="Ex: 9BWHE21JX24060960"  maxlength="17" required>
                </div>
                <div class="form-group">
                  <label for="veiculo-marca">Marca:</label>
                  <input type="text" maxlength="20" class="form-control" name="veiculo-marca" placeholder="Ex: VOLKSWAGEN" required>
                </div>
                <div class="form-group">
                  <label for="veiculo-pessoa">Pessoa:</label>
                  <select class="form-control" name="veiculo-pessoa">
                  <?php
                  $result = mysqli_query($con, "SELECT COD_PESSOA FROM PESSOA ORDER BY COD_PESSOA ASC;");
                  while ($pessoa = mysqli_fetch_assoc($result)) { ?>
                    <option><?php echo $pessoa['COD_PESSOA']; ?></option>
                  <?php } ?>
                  </select>
                </div>
                <input type="submit" class="btn btn-primary btn-block" value="Submeter">
              </form>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="item">
            <div class="botao btn btn-primary btn-block">
              Adicionar item
            </div>
            <div>
              <form action="?add=item" method="post">
                <div class="form-group">
                  <label for="item-descricao">Descrição:</label>
                  <input type="text" maxlength="100" class="form-control" name="item-descricao" placeholder="Ex: Alinhamento de carro" required>
                </div>
                <div class="form-group">
                  <label for="item-veiculo">Veículo:</label>
                  <select class="form-control" name="item-veiculo">
                    <?php
                    $result = mysqli_query($con, "SELECT CHASSI FROM VEICULO;");
                    while($chassi = mysqli_fetch_assoc($result)) { ?>
                    <option><?php echo $chassi['CHASSI']; ?></option>
                  <?php } ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="item-numos">Ordem de serviço:</label>
                  <select class="form-control" name="item-numos">
                    <?php
                    $result = mysqli_query($con, "SELECT NUMERO_OS FROM ORDEM_SERVICO ORDER BY NUMERO_OS ASC;");
                    while ($num_os = mysqli_fetch_assoc($result)) { ?>
                        <option><?php echo $num_os['NUMERO_OS']; ?></option>
                  <?php } ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="item-tipo">Tipo:</label>
                  <select class="form-control " name="item-tipo">
                    <option selected>Peça</option>
                    <option>Serviço</option>
                  </select>
                </div>
                <div class="form-group" id="item-fornecedor">
                  <label for="item-fornecedor">Fornecedor:</label>
                  <input type="text" maxlength="20" name="item-fornecedor" placeholder="Ex: Michellin" class="form-control">
                </div>
                <div class="form-group" id="item-garantia">
                  <label for="item-garantia">Garantia:</label>
                  <input type="number" name="item-garantia" placeholder="Ex: 2" class="form-control">
                </div>
                <input type="submit" class="btn btn-success btn-block" value="Submeter">
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script type="text/javascript" src="js/jquery-3.2.1.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
  </body>
</html>
<?php
if (isset($_GET['add'])) {
  if ($_GET['add']=='pessoa') {
    $nome=$_POST['pessoa-nome'];
    $endereco=$_POST['pessoa-endereco'];
    $tipo=$_POST['pessoa-tipo'];
    $telefone=$_POST['pessoa-telefone'];
    $especialidade=$_POST['pessoa-especialidade'];
    $sql = mysqli_query($con,"INSERT INTO PESSOA(COD_PESSOA, NOME, ENDERECO, TIPO, ESPECIALIDADE, TELEFONE) VALUES ('NULL','".$nome."','".$endereco."','".$tipo."','".$telefone."','".$especialidade."')");
  } else if ($_GET['add']=='veiculo') {
    $chassi=$_POST['veiculo-chassi'];
    $marca=$_POST['veiculo-marca'];
    $pessoa=$_POST['veiculo-pessoa'];
    $sql = mysqli_query($con,"INSERT INTO VEICULO(CHASSI,MARCA,COD_PESSOA) VALUES ('".$chassi."','".$marca."','".$pessoa."')");
  } else if ($_GET['add']=='item') {
    $descricao=$_POST['item-descricao'];
    $chassi_item=$_POST['item-veiculo'];
    $num_os=$_POST['item-numos'];
    $tipo=$_POST['item-tipo'];
    $garantia=$_POST['item-garantia'];
    $fornecedor=$_POST['item-fornecedor'];
    $sql = mysqli_query($con,"INSERT INTO ITEM(COD_ITEM,DESCRICAO,NUM_OS,CHASSI) VALUES ('NULL','".$descricao."','".$chassi_item."','".$num_os."')");
    if ($tipo == 'Peça') {
      $sql = mysqli_query($con, "INSERT INTO PECA(COD_PECA, FORNECEDOR) VALUES ('NULL', '".$fornecedor."')");
    } else {
      $sql = mysqli_query($con, "INSERT INTO PECA(COD_SERVICO, GARANTIA) VALUES ('NULL', '".$garantia."')");
    }
  }
}
?>
