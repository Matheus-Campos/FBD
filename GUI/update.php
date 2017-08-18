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
      <?php
      if (isset($_GET['tabela'])) {
        if ($_GET['tabela']=='pessoa') {
          echo $_GET['id'];
          $cod_pessoa = $_GET['id']; ?>
          <div class="esquerda arredondado">
            <div class="botao btn btn-primary btn-block">
              Adicionar pessoa
            </div>
            <div>
              <form action="?update=pessoa" method="post">
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
    mysqli_query($con, "UPDATE PESSOA SET NOME = '".$nome."', ENDERECO = '".$endereco."', TIPO = '".$tipo."', ESPECIALIDADE = '".$especialidade."', TELEFONE = '".$telefone."' WHERE COD_PESSOA = '".$cod_pessoa."'");
  }
}
 ?>
