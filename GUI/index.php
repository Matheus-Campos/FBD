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
      <h1 class="text-primary text-center">Oficina Esquema5</h1>
      <div class="row">
        <div class="col-xs-4">
          <div class="pessoa">
            <div class="botao btn btn-info btn-md">
              Adicionar pessoa
            </div>
            <div>
              <form action="addpessoa.php" method="post">
                <input type="text" class="form-control espacado" name="pessoa-nome" placeholder="Ex: Filipe" required>
                <input type="text" class="form-control espacado" name="pessoa-endereco" placeholder="Ex: Rua Mamanguape, 69" required>
                <select class="form-control espacado" name="">
                  <option selected>Mecânico</option>
                  <option>Cliente</option>
                </select>
                <input type="number" class="form-control espacado" id="pessoa-telefone" name="pessoa-telefone" placeholder="40028922">
                <input type="text" class="form-control espacado" id="pessoa-especialidade" name="pessoa-especialidade" placeholder="Motor">
                <input type="submit" class="btn btn-primary espacado" value="Submeter">
              </form>
            </div>
          </div>
        </div>
        <div class="col-xs-4">
          <div class="veiculo">
            <div class="botao btn btn-info btn-md">
              Adicionar veículo
            </div>
            <div>
              <form action="addveiculo.php" method="post">
                <input type="text" class="form-control espacado" name="veiculo-chassi" placeholder="Ex: 9BWHE21JX24060960" required>
                <input type="text" class="form-control espacado" name="veiculo-marca" placeholder="Ex: VOLKSWAGEN" required>
                <input type="text" class="form-control espacado" name="veiculo-pessoa" placeholder="Ex: 1">
                <input type="submit" class="btn btn-primary espacado" value="Submeter">
              </form>
            </div>
          </div>
        </div>
        <div class="col-xs-4">
          <div class="item">
            <div class="botao btn btn-info btn-md">
              Adicionar item
            </div>
            <div>
              <form action="additem.php" method="post">
                <input type="textarea" class="form-control espacado" name="item-descricao" placeholder="Ex: Alinhamento de carro" required>
                <input type="text" class="form-control espacado" name="item-veiculo" placeholder="Ex: 9BKHE220X24060961" required>
                <input type="number" class="form-control espacado" name="item-numos" placeholder="Ex: 2">
                <select class="form-control espacado" name="">
                  <option selected>Peça</option>
                  <option>Serviço</option>
                </select>
                <input type="submit" class="btn btn-primary espacado" value="Submeter">
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
