<?php

// includes

include_once './include/logado.php';

include_once './include/conexao.php';

include_once './include/header.php';
 
// Se houver ID, é edição

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$dados = ['Nome' => '', 'Email' => '', 'Usuario' => ''];
 
// Buscar dados do usuário (modo editar)

if ($id > 0) {

    $sql = "SELECT * FROM usuarios WHERE UsuarioID = $id";

    $resultado = mysqli_query($conexao, $sql);

    if ($resultado && mysqli_num_rows($resultado) > 0) {

        $dados = mysqli_fetch_assoc($resultado);

    }

}
 
// Se o formulário for enviado

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nome = mysqli_real_escape_string($conexao, $_POST['Nome']);

    $email = mysqli_real_escape_string($conexao, $_POST['Email']);

    $usuario = mysqli_real_escape_string($conexao, $_POST['Usuario']);

    $senha = $_POST['Senha'];
 
    if ($id > 0) {

        // Atualizar

        if (!empty($senha)) {

            $senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT);

            $sql = "UPDATE usuarios 

                    SET Nome='$nome', Email='$email', Usuario='$usuario', Senha='$senhaCriptografada' 

                    WHERE UsuarioID=$id";

        } else {

            $sql = "UPDATE usuarios 

                    SET Nome='$nome', Email='$email', Usuario='$usuario' 

                    WHERE UsuarioID=$id";

        }
 
        if (mysqli_query($conexao, $sql)) {

            echo "<script>alert('Usuário atualizado com sucesso!'); window.location='usuarios.php';</script>";

        } else {

            echo "<script>alert('Erro ao atualizar usuário.');</script>";

        }
 
    } else {

        // Inserir novo

        $senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT);

        $sql = "INSERT INTO usuarios (Nome, Email, Usuario, Senha) 

                VALUES ('$nome', '$email', '$usuario', '$senhaCriptografada')";

        if (mysqli_query($conexao, $sql)) {

            echo "<script>alert('Usuário cadastrado com sucesso!'); window.location='usuarios.php';</script>";

        } else {

            echo "<script>alert('Erro ao cadastrar usuário.');</script>";

        }

    }

}

?>
 
<main>
<div class="container">
<h1><?php echo ($id > 0) ? 'Editar Usuário' : 'Cadastrar Usuário'; ?></h1>
<form method="post">
<label>Nome:</label><br>
<input type="text" name="Nome" value="<?php echo htmlspecialchars($dados['Nome']); ?>" required><br><br>
 
      <label>Email:</label><br>
<input type="email" name="Email" value="<?php echo htmlspecialchars($dados['Email']); ?>" required><br><br>
 
      <label>Usuário:</label><br>
<input type="text" name="Usuario" value="<?php echo htmlspecialchars($dados['Usuario']); ?>" required><br><br>
 
      <label>Senha <?php echo ($id > 0) ? '(deixe em branco para não alterar)' : ''; ?>:</label><br>
<input type="password" name="Senha" <?php echo ($id == 0) ? 'required' : ''; ?>><br><br>
 
      <button type="submit" class="btn btn-save">Salvar</button>
<a href="usuarios.php" class="btn btn-cancel">Cancelar</a>
</form>
</div>
 
<?php include_once './include/footer.php'; ?>

 
cria o salvar-usuarios.php
 