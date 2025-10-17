<?php

include_once './include/conexao.php';
 
$id = $_GET['id'];

mysqli_query($conexao, "DELETE FROM categorias WHERE CategoriaID = $id");
 
header('Location: ' . $_SERVER['HTTP_REFERER']);

exit;

?>

 