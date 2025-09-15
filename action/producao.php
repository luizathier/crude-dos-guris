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
$sql = 'DELETE FROM producao WHERE ProducaoID ='.$id;
// executar o SQL 
$resultado = mysqli_query($conexao, $sql);
// redirecionar a pagina
header("Location: ../lista-producao.php");
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