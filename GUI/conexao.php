<?php
$con = mysqli_connect('localhost', 'root', '', 'EMPRESA');
if (!$con) {
  echo "Não foi possível conectar-se ao MySQL";
}
