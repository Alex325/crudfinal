<?php
@session_start();

include_once '../daos/Usuario.php';
include_once '../models/Usuario.php';

if (isset($_SESSION['login'])) header('Location: index.php');

if (isset($_POST['enviado'])) {
  $usuario = trim($_POST['usuario']);
  $senha = $_POST['senha'];

  if ($login = DataObjects\Usuario::login($usuario, $senha)) {
    $_SESSION['login_id'] = $login->id;
    $_SESSION['login'] = $login->usuario;
    header('Location: index.php');
    exit;
  }

  header('Location: login.php?erro=1');
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
  <link rel="stylesheet" href="../css/login.css">
  <link rel="shortcut icon" href="../icons/favicon64x64.svg" sizes="64x64" type="image/x-icon">
  <script src="../js/sideMenu.js" defer></script>
  <title>Diário</title>
</head>

<body>
  <?php include_once '../util/sideMenu.php'; ?>
  <div class="principal">
    <div class="conteudo">
      <?php include_once '../util/banner.php'; ?>
      <div class="conteudo-login">
        <div class="conteudo-form">
          <div class="login-form-container">
            <form action="" method="post" class="login-form">
              <div class="input-container input-container-usuario">
                <label class="label usuario" for="usuario-input">Usuário</label>
                <input type="text" autocomplete="off" name="usuario" id="usuario-input" class="input" required>
              </div>
              <div class="input-container input-container-senha">
                <label class="label senha" for="senha-input">Senha</label>
                <input type="password" name="senha" id="senha-input" class="input" required>
              </div>
              <div class="input-container input-container-sem-login">
                <span class="sem-login"><a id="signup-link" href="signup.php">Não tem login?</a></span>
              </div>
              <?php if (isset($_GET['erro'])) { ?>
                <div class="input-container input-container-erro">
                  <span class="erro" style="color: red;">Usuário ou senha inválidos.</span>
                </div>
              <?php } ?>
              <div class="input-container input-container-botoes">
                <button type="submit" class="botao submit">Entrar</button>
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