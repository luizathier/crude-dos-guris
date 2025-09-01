<?php 
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';
?>

<main>

  <div class="container">
      <h1>Lista de Produtos</h1>
      <a href="./salvar-produtos.php" class="btn btn-add">Incluir</a> 
      <table>
        <thead>
          <tr>
          <?php
            $sql = "SELECT p.ProdutoID, p.Nome, p.Preco, c.Nome AS Categoria
            FROM produtos p
            LEFT JOIN categorias c ON p.CategoriaID = c.CategoriaID";
            $resultado = mysqli_query($conexao, $sql);
            if (mysqli_num_rows($resultado) > 0) {
              while ($row = mysqli_fetch_assoc($resultado)) {
              echo "<tr>";
              echo "<td>" . $row['ProdutoID'] . "</td>";
             echo "<td>" . $row['Nome'] . "</td>";
             echo "<td>" . $row['Categoria'] . "</td>";
             echo "<td>R$ " . number_format($row['Preco'], 2, ',', '.') . "</td>";
            echo "<td>
              <a href='salvar-produtos.php?id=" . $row['ProdutoID'] . "' class='btn btn-edit'>Editar</a>
              <a href='excluir-produto.php?id=" . $row['ProdutoID'] . "' class='btn btn-delete' onclick=\"return confirm('Deseja excluir este produto?');\">Excluir</a> </td>";
        echo "</tr>"; }
      } else {
    echo "<tr><td colspan='5'>Nenhum produto encontrado</td></tr>";}
          ?>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>Produto A</td>
            <td>Categoria A</td>
            <td>R$ 10,00</td>
            <td>
              <a href="#" class="btn btn-edit">Editar</a>
              <a href="#" class="btn btn-delete">Excluir</a>
            </td>
          </tr>
          <tr>
            <td>2</td>
            <td>Produto B</td>
            <td>Categoria B</td>
            <td>R$ 20,00</td>
            <td>
              <a href="#" class="btn btn-edit">Editar</a>
              <a href="#" class="btn btn-delete">Excluir</a>
            </td>
          </tr>

        </tbody>
      </table>
    </div>

<?php 
  // include dos arquivox
  include_once './include/footer.php';
  ?>