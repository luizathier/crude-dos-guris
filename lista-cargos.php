<?php 
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';

?>
  <main>

    <div class="container">
        <h1>Lista de Cargos</h1>
        <a href="./salvar-cargos.php" class="btn btn-add">Incluir</a>
        <table>
          <thead>
            <tr>
            <?php
          // consulta os cargos
          $sql = 'SELECT * FROM cargos';
          $resultado = mysqli_query($conexao,$sql);

          if (mysqli_num_rows($resultado) > 0) {
              while ($row = mysqli_fetch_assoc($resultado)) {
                  echo "<tr>";
                  echo "<td>" . $row['CargoID'] . "</td>";
                  echo "<td>" . $row['Nome'] . "</td>";
                  echo "<td>" . $row['TetoSalarial'] . "</td>";
                  echo "<td>
                          <a href='salvar-cargos.php?id=" . $row['CargoID'] . "' class='btn btn-edit'>Editar</a>
                          <a href='excluir-cargo.php?id=" . $row['CargoID'] . "' class='btn btn-delete' onclick=\"return confirm('Deseja excluir este cargo?');\">Excluir</a>
                        </td>";
                  echo "</tr>";
              }
          } else {
              echo "<tr><td colspan='4'>Nenhum cargo encontrado</td></tr>";
          }
          ?>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>Dado A</td>
              <td>100</td>
              <td>
                <a href="salvar-cargos.php?id=" class="btn btn-edit">Editar</a>
                <a href="#" class="btn btn-delete">Excluir</a>
              </td>
            </tr>
            <tr>
              <td>2</td>
              <td>Dado B</td>
              <td>250</td>
              <td>
                <a href="salvar-cargos.php?id=" class="btn btn-edit">Editar</a>
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