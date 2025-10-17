<?php

include_once './include/logado.php';

include_once './include/conexao.php';

include_once './include/header.php';
 
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$dados = ['Nome' => '', 'Email' => '', 'Usuario' => ''];
 

if ($id > 0) {

    $sql = "SELECT * FROM usuarios WHERE UsuarioID = $id";

    $resultado = mysqli_query($conexao, $sql);

    if ($resultado && mysqli_num_rows($resultado) > 0) {

        $dados = mysqli_fetch_assoc($resultado);

    }

}
 

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

            echo "<script>alert('Usuário atualizado com sucesso!'); window.location='" . $_SERVER['HTTP_REFERER'] . "';</script>";

            exit;

        } else {

            echo "<script>alert('Erro ao atualizar usuário!'); window.history.back();</script>";

            exit;

        }
 
    } else {


        $senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT);

        $sql = "INSERT INTO usuarios (Nome, Email, Usuario, Senha) 

                VALUES ('$nome', '$email', '$usuario', '$senhaCriptografada')";

        if (mysqli_query($conexao, $sql)) {

            echo "<script>alert('Usuário cadastrado com sucesso!'); window.location='" . $_SERVER['HTTP_REFERER'] . "';</script>";

            exit;

        } else {

            echo "<script>alert('Erro ao cadastrar usuário!'); window.history.back();</script>";

            exit;

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
<a href="javascript:history.back()" class="btn btn-cancel">Cancelar</a>
</form>
</div>
 
<?php include_once './include/footer.php'; ?>

 

 