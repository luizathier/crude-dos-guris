<?php
// include dos arquivos
include_once   '../include/logado.php';
include_once   '../include/conexao.php';

// captura a acao dos dados
$acao = $_REQUEST['acao'];
$id = $_REQUEST['id'];

// validacao
switch ($acao) {
    case 'excluir':
// montar o SQL 
$sql = 'DELETE FROM funcionarios WHERE FuncionarioID ='.$id;
// executar o SQL 
$resultado = mysqli_query($conexao, $sql);
// redirecionar a pagina
header("Location: ../lista-funcionarios.php");
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