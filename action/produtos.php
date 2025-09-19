<?php
// include dos arquivos
include_once   '../include/logado.php';
include_once   '../include/conexao.php';

// captura a acao dos dados
$acao = $_GET['acao'];
$id = $_GET['id'];

// validacao
switch ($acao) {
    case 'excluir':
        // montar o SQL
        $sql = 'DELETE FROM produtos WHERE ProdutoID ='.$id;
        // executar o SQL
        $resultado = mysqli_query($conexao, $sql);
        // redirecionar a pagina
        header("Location: ../lista-produtos.php");
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