<?php
include_once './include/conexao.php';
 
$id = $_GET['id'];
mysqli_query($conexao, "DELETE FROM producao WHERE ProducaoID = $id");
 
header('Location: ' . $_SERVER['HTTP_REFERER']);
exit;
?>