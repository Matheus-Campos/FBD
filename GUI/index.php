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
        <div class="col-md-4">
          <div class="pessoa">
            <div class="botao btn btn-primary btn-block">
              Adicionar pessoa
            </div>
            <div>
              <form action="addpessoa.php" method="post">
                <div class="form-group">
                  <label for="pessoa-nome">Nome:</label>
                  <input type="text" class="form-control" name="pessoa-nome" placeholder="Ex: Filipe" required>
                </div>
                <div class="form-group">
                  <label for="pessoa-endereco">Endereço:</label>
                  <input type="text" class="form-control" name="pessoa-endereco" placeholder="Ex: Rua Mamanguape, 69" required>
                </div>
                <div class="form-group">
                  <label for="pessoa-tipo">Tipo:</label>
                  <select class="form-control" name="pessoa-tipo">
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
                  <input type="text" class="form-control" name="pessoa-especialidade" placeholder="Motor">
                </div>
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
              <form action="addveiculo.php" method="post">
                <div class="form-group">
                  <label for="veiculo-chassi">Chassi:</label>
                  <input type="text" class="form-control" name="veiculo-chassi" placeholder="Ex: 9BWHE21JX24060960" required>
                </div>
                <div class="form-group">
                  <label for="veiculo-marca">Marca:</label>
                  <input type="text" class="form-control" name="veiculo-marca" placeholder="Ex: VOLKSWAGEN" required>
                </div>
                <div class="form-group">
                  <label for="veiculo-pessoa">Pessoa (ID):</label>
                  <input type="text" class="form-control" name="veiculo-pessoa" placeholder="Ex: 1">
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
              <form action="additem.php" method="post">
                <div class="form-group">
                  <label for="item-descricao">Descrição:</label>
                  <input type="text" class="form-control" name="item-descricao" placeholder="Ex: Alinhamento de carro" required>
                </div>
                <div class="form-group">
                  <label for="item-veiculo">Veículo (Chassi):</label>
                  <input type="text" class="form-control" name="item-veiculo" placeholder="Ex: 9BKHE220X24060961" required>
                </div>
                <div class="form-group">
                  <label for="item-numos">Ordem de serviço (Número):</label>
                  <input type="number" class="form-control" name="item-numos" placeholder="Ex: 2">
                </div>
                <div class="form-group">
                  <label for="item-tipo">Tipo:</label>
                  <select class="form-control " name="item-tipo">
                    <option selected>Peça</option>
                    <option>Serviço</option>
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
