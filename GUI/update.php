<?php
require_once 'conexao.php';
?>
<html>
  <head>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1 class="text-primary text-center" onclick="window.location = 'read.php';">Oficina Esquema5</h1>
      <?php
      if (isset($_GET['tabela'])) {
        if ($_GET['tabela']=='pessoa') { ?>
          <div class="esquerda arredondado">
            <div class="botao btn btn-primary btn-block">
              Alterar pessoa <?php echo $_GET['id']; ?>
            </div>
            <div>
              <form action="?update=pessoa" method="post">
                <div class="form-group">
                  <input type="text" class="form-control oculto" name="cod-pessoa" <?php echo "value='".$_GET['id']."'"; ?> required>
                </div>
                <div class="form-group">
                  <label for="pessoa-nome">Nome:</label>
                  <input type="text" class="form-control" name="pessoa-nome" maxlength="20" placeholder="Ex: Filipe" required>
                </div>
                <div class="form-group">
                  <label for="pessoa-endereco">Endereço:</label>
                  <input type="text" class="form-control" name="pessoa-endereco" maxlength="255" placeholder="Ex: Rua Mamanguape, 69" required>
                </div>
                <?php $result = mysqli_query($con, "SELECT TIPO FROM PESSOA WHERE COD_PESSOA = '".$_GET['id']."'");

                 ?>
                <!--<div class="form-group">
                  <label for="pessoa-tipo">Tipo:</label>
                  <select class="form-control" name="pessoa-tipo" id="pessoa-tipo">
                    <option selected>--Nenhum--</option>
                    <option value="M">Mecânico</option>
                    <option value="C">Cliente</option>
                  </select>
                </div>-->
                <div class="form-group oculto" id="pessoa-telefone">
                  <label for="pessoa-telefone">Telefone:</label>
                  <input type="number" class="form-control" name="pessoa-telefone" placeholder="40028922">
                </div>
                <div class="form-group oculto" id="pessoa-especialidade">
                  <label for="pessoa-especialidade">Especialidade:</label>
                  <input type="text" class="form-control" maxlength="20" name="pessoa-especialidade" placeholder="Motor">
                </div>
                <input type="submit" class="btn btn-default btn-block" value="Submeter">
              </form>
            </div>
          </div>
        <?php } else if ($_GET['tabela']=='veiculo') { ?>
          <div class="centro arredondado">
            <div class="botao btn btn-primary btn-block">
              Alterar veículo <?php echo $_GET['id']; ?>
            </div>
            <div>
              <form action="?update=veiculo" method="post">
                <div class="form-group">
                  <input type="text" class="form-control oculto" name="veiculo-chassi-antigo" <?php echo "value='".$_GET['id']."'"; ?> required>
                </div>
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
        <?php } else if ($_GET['tabela']=='item') { ?>
          <div class="direita arredondado">
            <div class="botao btn btn-primary btn-block">
              Alterar item <?php echo $_GET['id']; ?>
            </div>
            <div>
              <form action="?update=item" method="post">
                <div class="form-group oculto">
                  <input type="number" name="cod-item-antigo" class="form-control" <?php echo "value='".$_GET['id']."'"; ?>>
                </div>
                <div class="form-group">
                  <label for="item-cod">Código:</label>
                  <input type="number" name="item-cod" class="form-control" placeholder="Ex: 1">
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
                <div class="form-group oculto">
                  <?php $item_id = $_GET['id'];
                        $id_peca = mysqli_query($con, "SELECT COD_PECA FROM PECA WHERE COD_PECA = '".$item_id."'");
                        if ($id_peca->num_rows == 0) { ?>
                            <input type="text" name="item-tipo" value="S">
                        <?php } else { ?>
                            <input type="text" name="item-tipo" value="P">
                        <?php } ?>
                </div>
                <?php if ($id_peca->num_rows != 0) { ?>
                <div class="form-group" id="item-fornecedor">
                  <label for="item-fornecedor">Fornecedor:</label>
                  <input type="text" maxlength="20" name="item-fornecedor" placeholder="Ex: Michellin" class="form-control">
                </div>
              <?php } else {?>
                <div class="form-group" id="item-garantia">
                  <label for="item-garantia">Garantia:</label>
                  <input type="number" name="item-garantia" placeholder="Ex: 2" class="form-control">
                </div>
              <?php } ?>
                <input type="submit" class="btn btn-success btn-block" value="Submeter">
              </form>
            </div>
          </div>
        <?php } else if($_GET['tabela']=='os'){?>
          <div class="centro arredondado">
            <div class="botao btn btn-primary btn-block">
              Alterar ordem de serviço <?php echo $_GET['id']; ?>
            </div>
            <div>
              <form action="?update=os" method="post">
                <div class="form-group oculto">
                  <input type="number" name="num-os" <?php echo "value='".$_GET['id']."'"; ?>>
                </div>
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
                    $result = mysqli_query($con, "SELECT ID_EQUIPE FROM EQUIPE;");
                    while($nome = mysqli_fetch_assoc($result)) { ?>
                    <option><?php echo $nome['ID_EQUIPE']; ?></option>
                  <?php } ?>
                  </select>
                </div>
                <input type="submit" class="btn btn-primary btn-block" value="Submeter">
              </form>
            </div>
          </div>
        <?php } else if ($_GET['tabela']=='equipe') {?>
          <div class="esquerda arredondado">
            <div class="botao btn btn-primary btn-block">
              Alterar equipe <?php echo $_GET['id']; ?>
            </div>
            <div>
              <form action="?update=equipe" method="post">
                <div class="form-group oculto">
                  <input type="number" class="form-control" name="id-equipe" <?php echo "value='".$_GET['id']."'"; ?>required>
                </div>
                <div class="form-group">
                  <label for="equipe-nome">Nome:</label>
                  <input type="text" class="form-control" name="equipe-nome" maxlength="20" placeholder="Ex: Jubilados" required>
                </div>
                <input type="submit" class="btn btn-default btn-block" value="Submeter">
              </form>
            </div>
          </div>
        <?php } else if ($_GET['tabela']=='pertence') {?>
          <div class="direita arredondado">
            <div class="botao btn btn-primary btn-block">
              Alterar relação pertence <?php echo $_GET['id1']."-".$_GET['id2']; ?>
            </div>
            <div>
              <form action="?update=pertence" method="post">
                <input type="number" name="pertence-equipe-antigo" class="oculto" <?php echo "value='".$_GET['id1']."'"; ?>>
                <input type="number" name="pertence-pessoa-antigo" class="oculto" <?php echo "value='".$_GET['id2']."'"; ?>>
                <div class="form-group">
                  <label for="pertence-equipe">Equipe:</label>
                  <select class="form-control" name="pertence-equipe">
                    <?php
                    $result = mysqli_query($con, "SELECT ID_EQUIPE FROM EQUIPE;");
                    while($equipe = mysqli_fetch_assoc($result)) { ?>
                    <option><?php echo $equipe['ID_EQUIPE']; ?></option>
                  <?php } ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="pertence-pessoa">Mecânico:</label>
                  <select class="form-control" name="pertence-pessoa">
                    <?php
                    $result = mysqli_query($con, "SELECT COD_PESSOA FROM PESSOA WHERE TIPO = 'M';");
                    while($pessoa = mysqli_fetch_assoc($result)) { ?>
                    <option><?php echo $pessoa['COD_PESSOA']; ?></option>
                  <?php } ?>
                  </select>
                </div>
                <input type="submit" class="btn btn-success btn-block" value="Submeter">
              </form>
            </div>
          </div>
        <?php } else if ($_GET['tabela']=='demanda') {?>
          <div class="centro arredondado">
            <div class="botao btn btn-primary btn-block">
              Alterar demanda da peca <?php echo $_GET['id1']." e serviço ".$_GET['id2']; ?>
            </div>
            <div>
              <form action="?update=demanda" method="post">
                <input type="number" name="demanda-peca-antigo" class="oculto" <?php echo "value='".$_GET['id1']."'"; ?>>
                <input type="number" name="demanda-servico-antigo" class="oculto" <?php echo "value='".$_GET['id2']."'"; ?>>
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
        <?php } ?>
      <?php } ?>
      <script type="text/javascript" src="js/jquery-3.2.1.js"></script>
      <script type="text/javascript" src="js/script.js"></script>
  </body>
</html>
<?php
if (isset($_GET['update'])) {
  if ($_GET['update']=='pessoa') {
    $nome=$_POST['pessoa-nome'];
    $endereco=$_POST['pessoa-endereco'];
    $tipo=$_POST['pessoa-tipo'];
    $especialidade=$_POST['pessoa-especialidade'];
    $telefone=$_POST['pessoa-telefone'];
    $cod_pessoa = $_POST['cod-pessoa'];
    mysqli_query($con, "UPDATE PESSOA SET NOME = '".$nome."', ENDERECO = '".$endereco."', TIPO = '".$tipo."', ESPECIALIDADE = '".$especialidade."', TELEFONE = '".$telefone."' WHERE COD_PESSOA = '".$cod_pessoa."'");
  } else if ($_GET['update']=='veiculo') {
    $chassi_antigo = $_POST['veiculo-chassi-antigo'];
    $chassi = $_POST['veiculo-chassi'];
    $marca = $_POST['veiculo-marca'];
    $pessoa = $_POST['veiculo-pessoa'];
    mysqli_query($con, "UPDATE VEICULO SET CHASSI = '".$chassi."', MARCA = '".$marca."', COD_PESSOA = '".$pessoa."' WHERE CHASSI = '".$chassi_antigo."'");
  } else if ($_GET['update']=='item') {
    $cod_item_antigo = $_POST['cod-item-antigo'];
    $cod_item = $_POST['item-cod'];
    $descricao = $_POST['item-descricao'];
    $veiculo = $_POST['item-veiculo'];
    $os = $_POST['item-numos'];
    $tipo = $_POST['item-tipo'];
    if ($tipo == 'P') {
      $fornecedor = $_POST['item-fornecedor'];
      mysqli_query($con, "UPDATE ITEM SET COD_ITEM = '".$cod_item."', DESCRICAO = '".$descricao."', NUM_OS = '".$os."', CHASSI = '".$veiculo."' WHERE COD_ITEM = '".$cod_item_antigo."'");
      mysqli_query($con, "UPDATE PECA SET FORNECEDOR = '".$fornecedor."' WHERE COD_PECA = '".$cod_item."'");
    } else {
      $garantia = $_POST['item-garantia'];
      mysqli_query($con, "UPDATE ITEM SET COD_ITEM = '".$cod_item."', DESCRICAO = '".$descricao."', NUM_OS = '".$os."', CHASSI = '".$veiculo."' WHERE COD_ITEM = '".$cod_item_antigo."'");
      mysqli_query($con, "UPDATE SERVICO SET GARANTIA = '".$garantia."' WHERE COD_SERVICO = '".$cod_item."'");
    }

  } else if ($_GET['update']=='os') {
    $numos = $_POST['num-os'];
    $emissao = $_POST['os-emissao'];
    $conclusao = $_POST['os-conclusao'];
    $chassi = $_POST['os-veiculo'];
    $equipe = $_POST['os-equipe'];
    mysqli_query($con, "UPDATE ORDEM_SERVICO SET DATA_EMISSAO = '".$emissao."', DATA_CONCLUSAO = '".$conclusao."', CHASSI = '".$chassi."', ID_EQUIPE = '".$equipe."' WHERE NUMERO_OS = '".$numos."'");
  } else if ($_GET['update']=='equipe') {
    $id_equipe = $_POST['id-equipe'];
    $nome = $_POST['equipe-nome'];
    mysqli_query($con, "UPDATE EQUIPE SET NOME = '".$nome."' WHERE ID_EQUIPE = '".$id_equipe."'");
  } else if ($_GET['update']=='pertence') {
    $pertence_equipe_antigo = $_POST['pertence-equipe-antigo'];
    $pertence_pessoa_antigo = $_POST['pertence-pessoa-antigo'];
    $equipe = $_POST['pertence-equipe'];
    $pessoa = $_POST['pertence-pessoa'];
    mysqli_query($con, "UPDATE PERTENCE SET ID_EQUIPE = '".$equipe."', COD_PESSOA = '".$pessoa."' WHERE ID_EQUIPE = '".$pertence_equipe_antigo."' AND COD_PESSOA = '".$pertence_pessoa_antigo."'");
  } else if ($_GET['update']=='demanda') {
    $demanda_peca_antigo = $_POST['demanda-peca-antigo'];
    $demanda_servico_antigo = $_POST['demanda-servico-antigo'];
    $peca = $_POST['demanda-peca'];
    $servico = $_POST['demanda-servico'];
    mysqli_query($con, "UPDATE DEMANDA SET COD_ITEM_PECA = '".$peca."', COD_ITEM_SERVICO = '".$servico."' WHERE COD_ITEM_PECA = '".$demanda_peca_antigo."' AND COD_ITEM_SERVICO = '".$demanda_servico_antigo."'");
  }
}
 ?>
