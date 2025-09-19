<?php 
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';
?>

  
  <main>

    <div id="funcionarios" class="tela">
        <form class="crud-form">
          <h2>Cadastro de Funcionários</h2>
          <input type="text" placeholder="Nome">
          <input type="date" placeholder="Data de Nascimento">
          <input type="email" placeholder="Email">
          <input type="number" placeholder="Salário">
          <select>
            <option value="">Sexo</option>
            <option value="M">Masculino</option>
            <option value="F">Feminino</option>
          </select>
          <input type="text" placeholder="CPF">
          <input type="text" placeholder="RG">
          <select>
          <option value="">Cargo</option>
          <?php
          $sql_cargo = "SELECT CargoID, Nome FROM cargos ORDER BY Nome";
          $result_cargo = mysqli_query($conexao, $sql_cargo);

          if(mysqli_num_rows($result_cargo) > 0){
              while($row = mysqli_fetch_assoc($result_cargo)){
                  echo "<option value='".$row['CargoID']."'>".$row['Nome']."</option>";
              }
          }
          ?>
          </select>
          <select>
            <option value="">Setor</option>
            <option value="">Setor</option>
          <?php
          $sql_setor = "SELECT SetorID, Nome FROM setor ORDER BY Nome";
          $result_setor = mysqli_query($conexao, $sql_setor);

          if(mysqli_num_rows($result_setor) > 0){
              while($row = mysqli_fetch_assoc($result_setor)){
                  echo "<option value='".$row['SetorID']."'>".$row['Nome']."</option>";
              }
          }
          ?>
          </select>
          <button type="submit">Salvar</button>
        </form>
      </div>


   
  </main>

  <?php 
  // include dos arquivox
  include_once './include/footer.php';
  ?>
