<?php 

include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';

?>
<main>
<div class="container">
<h1>Lista de Produções</h1>
<a href="./salvar-producao.php" class="btn btn-add">Incluir</a> 
<table>
<thead>
    <tr>
        <th>ID</th>
        <th>ProdutoID</th>
        <th>FuncionarioID</th>
        <th>ClienteID</th>
        <th>Data Produção</th>
        <th>Data Entrega</th>
        <th>Ações</th>
    </tr>
</thead>
<tbody>
<?php
        $sql = "SELECT * FROM producao ORDER BY ProducaoID ASC";
        $resultado = mysqli_query($conexao, $sql);
        if ($resultado && mysqli_num_rows($resultado) > 0) {
        while ($linha = mysqli_fetch_assoc($resultado)) {

            echo "<tr>";
            echo "<td>".$linha['ProducaoID']."</td>";
            echo "<td>".$linha['ProdutoID']."</td>";
            echo "<td>".$linha['FuncionarioID']."</td>";
            echo "<td>".$linha['ClienteID']."</td>";
            echo "<td>".$linha['DataProducao']."</td>";
            echo "<td>".($linha['DataEntrega'] ?? '-')."</td>";
            echo "<td>
<a href='editar-producao.php?id=".$linha['ProducaoID']."' class='btn btn-edit'>Editar</a>
<a href='excluir-producao.php?id=".$linha['ProducaoID']."' class='btn btn-delete'>Excluir</a>
</td>";
            echo "</tr>";
          }

        } else {
          echo "<tr><td colspan='7'>Nenhum registro encontrado.</td></tr>";
        }

        ?>
</tbody>
</table>
</div>
</main>

<?php 
include_once './include/footer.php';
?>

 