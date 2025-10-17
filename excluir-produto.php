<?php

include_once './include/conexao.php';
 
$id = $_GET['id'];

mysqli_query($conexao, "DELETE FROM produtos WHERE ProdutoID = $id");
 
header('Location: ' . $_SERVER['HTTP_REFERER']);

exit;

?>

 
<?php

include_once './include/conexao.php';
 
$id = $_GET['id'];

mysqli_query($conexao, "DELETE FROM clientes WHERE ClienteID = $id");
 
header('Location: ' . $_SERVER['HTTP_REFERER']);

exit;

?>

 