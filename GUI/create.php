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
      <h1 class="text-primary text-center" onclick="window.location = 'index.html';">Oficina Esquema5</h1>
      <div class="row">
        <div class="col-md-4">
          <div class="esquerda arredondado">
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
                    <option selected>--Nenhum--</option>
                    <option value="M">Mecânico</option>
                    <option value="C">Cliente</option>
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
          </div>
          <div class="esquerda arredondado">
            <div class="botao btn btn-primary btn-block">
              Adicionar equipe
            </div>
            <div>
              <form action="?add=equipe" method="post">
                <div class="form-group">
                  <label for="equipe-nome">Nome:</label>
                  <input type="text" class="form-control" name="equipe-nome" maxlength="20" placeholder="Ex: Jubilados" required>
                </div>
                <input type="submit" class="btn btn-default btn-block" value="Submeter">
              </form>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="centro arredondado">
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
                  $result = mysqli_query($con, "SELECT COD_PESSOA FROM PESSOA WHERE TIPO = 'C' ORDER BY COD_PESSOA ASC;");
                  while ($pessoa = mysqli_fetch_assoc($result)) { ?>
                    <option><?php echo $pessoa['COD_PESSOA']; ?></option>
                  <?php } ?>
                  </select>
                </div>
                <input type="submit" class="btn btn-primary btn-block" value="Submeter">
              </form>
            </div>
          </div>
          <div class="centro arredondado">
            <div class="botao btn btn-primary btn-block">
              Adicionar ordem de serviço
            </div>
            <div>
              <form action="?add=os" method="post">
                <div class="form-group">
                  <label for="os-emissao">Data de emissão:</label>
                  <input type="date" class="form-control" name="os-emissao" placeholder="" required>
                </div>
                <div class="form-group">
                  <label for="os-conclusao">Data de conclusão:</label>
                  <input type="date" name="os-conclusao" class="form-control">
                </div>
                <div class="form-group">
                  <label for="os-veiculo">Veículo:</label>
                  <select class="form-control" name="os-veiculo">
                    <?php
                    $result = mysqli_query($con, "SELECT CHASSI FROM VEICULO;");
                    while($chassi = mysqli_fetch_assoc($result)) { ?>
                    <option><?php echo $chassi['CHASSI']; ?></option>
                  <?php } ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="os-equipe">Equipe:</label>
                  <select class="form-control" name="os-equipe">
                    <?php
                    $result = mysqli_query($con, "SELECT NOME FROM EQUIPE;");
                    while($nome = mysqli_fetch_assoc($result)) { ?>
                    <option><?php echo $nome['NOME']; ?></option>
                  <?php } ?>
                  </select>
                </div>
                <input type="submit" class="btn btn-primary btn-block" value="Submeter">
              </form>
            </div>
          </div>
          <div class="centro arredondado">
            <div class="botao btn btn-primary btn-block">
              Adicionar demanda de peça
            </div>
            <div>
              <form action="?add=demanda" method="post">
                <div class="form-group">
                  <label for="demanda-peca">Peça:</label>
                  <select class="form-control" name="demanda-peca">
                    <?php
                    $result = mysqli_query($con, "SELECT COD_PECA FROM PECA;");
                    while($peca = mysqli_fetch_assoc($result)) { ?>
                    <option><?php echo $peca['COD_PECA']; ?></option>
                  <?php } ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="demanda-servico">Serviço:</label>
                  <select class="form-control" name="demanda-servico">
                    <?php
                    $result = mysqli_query($con, "SELECT COD_SERVICO FROM SERVICO;");
                    while($servico = mysqli_fetch_assoc($result)) { ?>
                    <option><?php echo $servico['COD_SERVICO']; ?></option>
                  <?php } ?>
                  </select>
                </div>
                <input type="submit" class="btn btn-primary btn-block" value="Submeter">
              </form>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="direita arredondado">
            <div class="botao btn btn-primary btn-block">
              Adicionar item
            </div>
            <div>
              <form action="?add=item" method="post">
                <div class="form-group">
                  <label for="item-cod">Código:</label>
                  <input type="text" name="item-cod" class="form-control" placeholder="Ex: 1">
                </div>
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
                  <select class="form-control " name="item-tipo" id="item-tipo">
                    <option selected>--Nenhum--</option>
                    <option value="P">Peça</option>
                    <option value="S">Serviço</option>
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
          <div class="direita arredondado">
            <div class="botao btn btn-primary btn-block">
              Adicionar mecânico à equipe
            </div>
            <div>
              <form action="?add=pertence" method="post">
                <div class="form-group">
                  <label for="pertence-equipe">Equipe:</label>
                  <select class="form-control" name="pertence-equipe">
                    <?php
                    $result = mysqli_query($con, "SELECT NOME FROM EQUIPE;");
                    while($equipe = mysqli_fetch_assoc($result)) { ?>
                    <option><?php echo $equipe['NOME']; ?></option>
                  <?php } ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="pertence-pessoa">Mecânico:</label>
                  <select class="form-control" name="pertence-pessoa">
                    <?php
                    $result = mysqli_query($con, "SELECT NOME FROM PESSOA WHERE TIPO = 'M';");
                    while($pessoa = mysqli_fetch_assoc($result)) { ?>
                    <option><?php echo $pessoa['NOME']; ?></option>
                  <?php } ?>
                  </select>
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
    mysqli_query($con,"INSERT INTO PESSOA(COD_PESSOA, NOME, ENDERECO, TIPO, ESPECIALIDADE, TELEFONE) VALUES ('NULL','".$nome."','".$endereco."','".$tipo."','".$especialidade."','".$telefone."')");
  } else if ($_GET['add']=='veiculo') {
    $chassi=$_POST['veiculo-chassi'];
    $marca=$_POST['veiculo-marca'];
    $pessoa=$_POST['veiculo-pessoa'];
    mysqli_query($con,"INSERT INTO VEICULO(CHASSI,MARCA,COD_PESSOA) VALUES ('".$chassi."','".$marca."','".$pessoa."')");
  } else if ($_GET['add']=='item') {
    $cod_item = $_POST['item-cod'];
    $descricao=$_POST['item-descricao'];
    $chassi_item=$_POST['item-veiculo'];
    $num_os=$_POST['item-numos'];
    $tipo=$_POST['item-tipo'];
    $garantia=$_POST['item-garantia'];
    $fornecedor=$_POST['item-fornecedor'];
    mysqli_query($con,"INSERT INTO ITEM(COD_ITEM,DESCRICAO,NUM_OS,CHASSI) VALUES ('".$cod_item."','".$descricao."','".$chassi_item."','".$num_os."')");
    if ($tipo == 'Peça') {
      mysqli_query($con, "INSERT INTO PECA(COD_PECA, FORNECEDOR) VALUES ('".$cod_item."', '".$fornecedor."')");
    } else {
      mysqli_query($con, "INSERT INTO PECA(COD_SERVICO, GARANTIA) VALUES ('".$cod_item."', '".$garantia."')");
    }
  } else if ($_GET['add']=='equipe') {
    $nome=$_POST['equipe-nome'];
    mysqli_query($con, "INSERT INTO EQUIPE (ID_EQUIPE, NOME) VALUES ('NULL', '".$nome."')");
  } else if ($_GET['add']=='os') {
    $data_emissao = $_POST['os-emissao'];
    $data_conclusao = $_POST['os-conclusao'];
    $chassi = $_POST['os-veiculo'];
    $equipe = $_POST['os-equipe'];
    echo $data_emissao;
    mysqli_query($con, "INSERT INTO ORDEM_SERVICO (NUM_OS, DATA_EMISSAO, DATA_CONCLUSAO, CHASSI, ID_EQUIPE) VALUES ('NULL', '".$data_emissao."', '".$data_conclusao."', '".$chassi."', '".$equipe."')");
  } else if ($_GET['add']=='pertence') {
    $equipe_nome = $_POST['pertence-equipe'];
    $pessoa_nome = $_POST['pertence-pessoa'];
    $cod_pessoa_pertence = mysqli_fetch_assoc(mysqli_query($con, "SELECT COD_PESSOA FROM PESSOA WHERE NOME = '".$pessoa_nome."'"))['COD_PESSOA'];
    $cod_equipe_pertence = mysqli_fetch_assoc(mysqli_query($con, "SELECT ID_EQUIPE FROM EQUIPE WHERE NOME = '".$equipe_nome."'"))['ID_EQUIPE'];
    mysqli_query($con, "INSERT INTO PERTENCE (ID_EQUIPE, COD_PESSOA) VALUES ('".$cod_equipe_pertence."', '".$cod_pessoa_pertence."')");
  } else if ($_GET['add']=='demanda') {
    $cod_peca = $_POST['demanda-peca'];
    $cod_servico = $_POST['demanda-servico'];
    mysqli_query($con, "INSERT INTO DEMANDA (COD_ITEM_PECA, COD_ITEM_SERVICO) VALUES ('".$cod_peca."','".$cod_servico."')");
  }
}
?>
