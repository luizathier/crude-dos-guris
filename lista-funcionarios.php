<?php 
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';
?>

<main>

  <div class="container">
      <h1>Lista de Funcionários</h1>
      <a href="./salvar-funcionarios.php" class="btn btn-add">Incluir</a> 
      <table>
        <thead>
          <tr>
          <?php
          $sql = "SELECT f.FuncionarioID, f.Nome, c.Nome AS Cargo, s.Nome AS Setor
                  FROM funcionarios f
                  LEFT JOIN cargos c ON f.CargoID = c.CargoID
                  LEFT JOIN setor s ON f.SetorID = s.SetorID";
          $resultado = mysqli_query($conexao, $sql);

          if (mysqli_num_rows($resultado) > 0) {
              while ($row = mysqli_fetch_assoc($resultado)) {
                  echo "<tr>";
                  echo "<td>" . $row['FuncionarioID'] . "</td>";
                  echo "<td>" . $row['Nome'] . "</td>";
                  echo "<td>" . $row['Cargo'] . "</td>";
                  echo "<td>" . $row['Setor'] . "</td>";
                  echo "<td>
                          <a href='salvar-funcionarios.php?id=" . $row['FuncionarioID'] . "' class='btn btn-edit'>Editar</a>
                          <a href='excluir-funcionario.php?id=" . $row['FuncionarioID'] . "' class='btn btn-delete' onclick=\"return confirm('Deseja excluir este funcionário?');\">Excluir</a>
                        </td>";
                  echo "</tr>";
              }
          } else {
              echo "<tr><td colspan='5'>Nenhum funcionário encontrado</td></tr>";
          }
          ?>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>Funcionário A</td>
            <td>Cargo A</td>
            <td>Setor A</td>
            <td>
              <a href="#" class="btn btn-edit">Editar</a>
              <a href="#" class="btn btn-delete">Excluir</a>
            </td>
          </tr>
          <tr>
            <td>2</td>
            <td>Funcionário B</td>
            <td>Cargo B</td>
            <td>Setor B</td>
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