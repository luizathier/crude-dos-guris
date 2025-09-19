<?php 
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';
?>
  
  <main>

    <div id="produtos" class="tela">
        <form class="crud-form" action="" method="post">
          <h2>Cadastro de Produtos</h2>
          <input type="text" placeholder="Nome do Produto">
          <input type="number" placeholder="Preço">
          <input type="number" placeholder="Peso (g)">
          <textarea placeholder="Descrição"></textarea>
          <select>
            <option value="">Categoria</option>
          <?php
          $sql_cat = "SELECT CategoriaID, Nome FROM categorias ORDER BY Nome";
          $result_cat = mysqli_query($conexao, $sql_cat);

          if(mysqli_num_rows($result_cat) > 0){
              while($row = mysqli_fetch_assoc($result_cat)){
                  echo "<option value='".$row['CategoriaID']."'>".$row['Nome']."</option>";
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