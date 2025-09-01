<?php 
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';
?>
  <main>

    <div class="container">
        <h1>Lista de Setores</h1>
        <a href="./salvar-setores.php" class="btn btn-add">Incluir</a>
        
        <table>
          <thead>
            <tr>
            <?php
              $sql = "SELECT * FROM setor";
              $resultado = mysqli_query($conexao, $sql);
              if (mysqli_num_rows($resultado) > 0) {
              while ($row = mysqli_fetch_assoc($resultado)) {
                echo "<tr>";
               echo "<td>" . $row['SetorID'] . "</td>";
                echo "<td>" . $row['Nome'] . "</td>";
                echo "<td>" . $row['Andar'] . "</td>";
                echo "<td>" . $row['Cor'] . "</td>";
                echo "<td>
                <a href='salvar-setores.php?id=" . $row['SetorID'] . "' class='btn btn-edit'>Editar</a>
                <a href='excluir-setor.php?id=" . $row['SetorID'] . "' class='btn btn-delete' onclick=\"return confirm('Deseja excluir este setor?');\">Excluir</a> </td>"; 
                echo "</tr>"; }
              } else {echo "<tr><td colspan='5'>Nenhum setor encontrado</td></tr>";}

            ?>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>Dado A</td>
              <td>1</td>
              <td>Verde</td>
              <td>
                <a href="#" class="btn btn-edit">Editar</a>
                <a href="#" class="btn btn-delete">Excluir</a>
              </td>
            </tr>
            <tr>
              <td>2</td>
              <td>Dado B</td>
              <td>1</td>
              <td>Verde</td>
              <td>
                <a href="#" class="btn btn-edit">Editar</a>
                <a href="#" class="btn btn-delete">Excluir</a>
              </td>
            </tr>
            
          </tbody>
        </table>
      </div>

  </main>

  <?php 
  // include dos arquivox
  include_once './include/footer.php';
  ?>