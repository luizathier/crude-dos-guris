<?php
include_once './include/conexao.php';

$id = $_GET['id'];
mysqli_query($conexao, "DELETE FROM cargos WHERE CargoID = $id");

header('Location: ' . $_SERVER['HTTP_REFERER']);
exit;
?>
