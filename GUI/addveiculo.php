<<html>
<?php
require_once "conexao.php";
$chassi=$_POST['veiculo-chassi'];
$marca=$_POST['veiculo-marca'];
$pessoa=$_POST['veiculo-pessoa'];
$sql = mysqli_query($con,"INSERT INTO VEICULO(CHASSI,MARCA,COD_PESSOA) VALUES ($chassi,$marca,$pessoa)");
?>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <title>addveiculo.php</title>
</head>
<body>
    <h3 class="text-success text-center">Veículo cadastrado com sucesso</h3>
    <a href="index.php"><button type="button" class="btn btn-success" >Voltar</button></a>
</body>
</html>
