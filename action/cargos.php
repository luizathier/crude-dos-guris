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
$sql = 'DELETE FROM cargos WHERE CargoID ='.$id;
// executar o SQL 
$resultado = mysqli_query($conexao, $sql);
// redirecionar a pagina
header("Location: .c:/xampp/htdocs/crude-dosguri/lista-cargos.php");
        break;
    case 'salvar':
        if(!empty($id)){
            $sql = 'UPDATE cargos SET NomeCargo = '$nome' WHERE CargoID = ' . intval($id);
        }else{
            $sql = 'INSERT INTO cargos (NomeCargo) VALUES ('$nome')';
        }
        break;

    default:
        # code...
        break;
}
?>