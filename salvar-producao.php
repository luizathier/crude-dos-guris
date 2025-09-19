<?php
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';
?>
  <main>
 
    <div id="producao" class="tela">
        <form class="crud-form" method="post" action="">
          <h2>Cadastro de Produção de Produtos</h2>
          <select>
            <option value="">Funcionário</option>
            <?php
          $sql_func = "SELECT FuncionarioID, Nome FROM funcionarios ORDER BY Nome";
          $result_func = mysqli_query($conexao, $sql_func);
 
          if(mysqli_num_rows($result_func) > 0){
              while($row = mysqli_fetch_assoc($result_func)){
                  echo "<option value='".$row['FuncionarioID']."'>".$row['Nome']."</option>";
              }
          }
          ?>
          </select>
          <select>
            <option value="">Produto</option>
            <?php
          $sql_prod = "SELECT ProdutoID, Nome FROM produtos ORDER BY Nome";
          $result_prod = mysqli_query($conexao, $sql_prod);
 
          if(mysqli_num_rows($result_prod) > 0){
              while($row = mysqli_fetch_assoc($result_prod)){
                  echo "<option value='".$row['ProdutoID']."'>".$row['Nome']."</option>";
              }
          }
          ?>
          </select>
          <select name="cliente" required>
          <option value="">Selecione o Cliente</option>
          <?php
          $sql_cli = "SELECT ClienteID, Nome FROM clientes ORDER BY Nome";
          $result_cli = mysqli_query($conexao, $sql_cli);
 
          if(mysqli_num_rows($result_cli) > 0){
              while($row = mysqli_fetch_assoc($result_cli)){
                  echo "<option value='".$row['ClienteID']."'>".$row['Nome']."</option>";
              }
          }
          ?>
        </select>
          <label for="">Data da entrega</label>
          <input type="date" placeholder="Data da Entrega">
          <input type="number" placeholder="Quantidade Produzida">
          <button type="submit">Salvar</button>
        </form>
      </div>
   
  </main>
  <?php
  // include dos arquivox
  include_once './include/footer.php';
  ?>
 