<?php 

@session_start();

include_once '../daos/Usuario.php';
include_once '../models/Usuario.php';
include_once '../util/funcoes.php';

if (isset($_SESSION['login'])) header('Location: index.php');

if (isset($_POST['enviado'])) {
  $usuario = trim($_POST['usuario']);
  $senha = bcrypt_gen($_POST['senha']);

  $obj = new Models\Usuario(null, $usuario, $senha);

  if (DataObjects\Usuario::addUsuario($obj)) {
    header('Location: login.php');
    exit();
  }

  header('Location: signup.php?erro=1');

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/sideMenu.css">
  <link rel="stylesheet" href="../css/principal.css">
  <link rel="stylesheet" href="../css/signup.css">
  <link rel="shortcut icon" href="../icons/favicon64x64.svg" sizes="64x64" type="image/x-icon">
  <script src="../js/sideMenu.js" defer></script>
  <title>Diário</title>
</head>

<body>
  <?php include_once '../util/sideMenu.php'; ?>
  <div class="principal">
    <div class="conteudo">
      <?php include_once '../util/banner.php'; ?>
      <div class="conteudo-signup">
        <div class="conteudo-form">
          <div class="signup-form-container">
            <form action="" method="post" class="signup-form">
              <div class="input-container input-container-usuario">
                <label class="label usuario" for="usuario-input">Usuário</label>
                <input type="text" name="usuario" id="usuario-input" class="input" required>
                <?php if (isset($_GET['erro'])) { ?> <span style="color: red;">Usuário já existe.</span> <?php } ?>
              </div>
              <div class="input-container input-container-senha">
                <label class="label senha" for="senha-input">Senha</label>
                <input minlength="8" type="password" name="senha" id="senha-input" class="input" required>
              </div>
              <div class="input-container input-container-botoes">
                <button type="submit" class="botao submit">Criar</button>
                <input type="hidden" name="enviado" value="enviado">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>