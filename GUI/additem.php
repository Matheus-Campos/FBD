<<html>
<?php
require_once "conexao.php";
$descricao=$_POST['item-descricao'];
$chassi_item=$_POST['item-veiculo'];
$num_os=$_POST['item-numos'];
$sql = mysqli_query($con,"INSERT INTO ITEM(COD_ITEM,DESCRICAO,NUM_OS,CHASSI) VALUES (null,$descricao,$chassi_item,$num_os)");
?>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <title>additem.php</title>
</head>
<body>
    <h3 class="text-success text-center">Item cadastrado com sucesso</h3>
    <a href="index.php"><button type="button" class="btn btn-success" >Voltar</button></a>
</body>
</html>
