<?php
// include dos arquivos
include_once   '../include/logado.php';
include_once   '../include/conexao.php';

// captura a acao dos dados
$acao = $_GET['acao'];

// validacao
switch ($acao) {
     case 'excluir':
// montar o SQL 
$sql = 'DELETE FROM categorias WHERE CategoriaID ='.$id;
 // executar o SQL 
 $resultado = mysqli_query($conexao, $sql);
// redirecionar a pagina
header("Location: ../lista-categorias.php");
        break;
     case 'salvar':
        if(!empty($id);){
            $sql = 'UPDATE';
        }else{
            $sql = 'INSERT INTO';
        }
        break;
    default:
        # code...
        break;
}
?>