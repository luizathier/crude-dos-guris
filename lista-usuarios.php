<?php 
// include dos arquivos
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';
?>

<main>
  <div class="container">
      <h1>Lista de Usuários</h1>
      <a href="./salvar-usuarios.php" class="btn btn-add">Incluir</a> 
      
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Usuário</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $sql = "SELECT UsuarioID, Nome, Email, Usuario FROM usuarios ORDER BY Nome ASC";
          $resultado = mysqli_query($conexao, $sql);

          if (mysqli_num_rows($resultado) > 0) {
              while ($row = mysqli_fetch_assoc($resultado)) {
                  echo "<tr>";
                  echo "<td>" . $row['UsuarioID'] . "</td>";
                  echo "<td>" . $row['Nome'] . "</td>";
                  echo "<td>" . $row['Email'] . "</td>";
                  echo "<td>" . $row['Usuario'] . "</td>";
                  echo "<td>
                          <a href='salvar-usuarios.php?id=" . $row['UsuarioID'] . "' class='btn btn-edit'>Editar</a>
                          <a href='excluir-usuario.php?id=" . $row['UsuarioID'] . "' class='btn btn-delete' onclick=\"return confirm('Deseja excluir este usuário?');\">Excluir</a>
                        </td>";
                  echo "</tr>";
              }
          } else {
              echo "<tr><td colspan='5'>Nenhum usuário encontrado</td></tr>";
          }
          ?>
        </tbody>
      </table>
    </div>

<?php 
  include_once './include/footer.php';
?>
