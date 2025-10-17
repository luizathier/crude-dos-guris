<?php
include_once './include/logado.php';
include_once './include/conexao.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "DELETE FROM usuarios WHERE UsuarioID = $id";

    if (mysqli_query($conexao, $sql)) {
        echo "<script>alert('Usuário excluído com sucesso!'); window.location='" . $_SERVER['HTTP_REFERER'] . "';</script>";
    } else {
        echo "<script>alert('Erro ao excluir usuário!'); window.history.back();</script>";
    }
} else {
    echo "<script>alert('ID de usuário não informado!'); window.history.back();</script>";
}
?>
