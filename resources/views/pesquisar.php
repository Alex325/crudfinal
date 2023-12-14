<?php

@session_start();

if (!isset($_SESSION['login'])) header('Location: login.php');

include_once '../util/conexao.php';
include_once '../daos/Registro.php';
include_once '../daos/Fotografia.php';
include_once '../util/funcoes.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/sideMenu.css">
  <link rel="stylesheet" href="../css/principal.css">
  <link rel="stylesheet" href="../css/viewReg.css">
  <link rel="stylesheet" href="../css/viewFoto.css">
  <link rel="stylesheet" href="../css/pesquisar.css">
  <link rel="shortcut icon" href="../icons/favicon64x64.svg" sizes="64x64" type="image/x-icon">
  <script src="../js/sideMenu.js" defer></script>
  <title>Diário</title>
</head>

<body>
  <?php include_once '../util/sideMenu.php'; ?>
  <div class="principal">
    <div class="conteudo">
      <?php include_once '../util/banner.php'; ?>
      <div class="conteudo-form">
        <div class="pesquisar-form-container">
          <form action="" method="post" class="pesquisar-form">
            <div class="input-container input-container-titulo">
              <label class="label titulo" for="titulo-input">Título</label>
              <input type="text" name="pesquisa" id="titulo-input" class="input" required>
            </div>
            <div class="input-container input-container-botoes">
              <button type="submit" class="botao submit">Pesquisar</button>
              <button type="reset" class="botao reset">Limpar</button>
              <input type="hidden" name="enviado" value="enviado">
            </div>
          </form>
        </div>
        <?php
        if (isset($_POST['enviado'])) {
          $pesquisa = '%' . $_POST['pesquisa'] . '%';

          $resultRegistros = DataObjects\Registro::getRegistroByTitulo($pesquisa, $_SESSION['login_id']);
          $resultFotos = DataObjects\Fotografia::getFotografiaByLegenda($pesquisa, $_SESSION['login_id']);

          echo "<div>";
          if (count($resultRegistros) > 0) {
            echo "<div class='conteudo-regs'>
                        <div class='registros-encontrados-container'>
                        <span class='registros-encontrados'>Registros</span>
                        </div>";
            foreach ($resultRegistros as $row) {
              echo regCell($row);
            }
            echo "</div>";
          } else {
            echo "<div class='conteudo-regs'>
                        <div class='registros-encontrados-container'>
                        <span class='registros-encontrados'>Nenhum registro encontrado</span>
                        </div>
            </div>";
          }
          if (count($resultFotos) > 0) {
            echo '<div class="conteudo-fotos">
                            <div class="fotos-encontradas-container">
                                <span class="fotos-encontradas">Fotografias</span>
                            </div>
                            <div class="foto-row">';

            foreach ($resultFotos as $foto) {
              echo fotoCell($foto);
            }
            echo '</div>
                        </div>';
          }
          else {
            echo '<div class="conteudo-fotos">
                            <div class="fotos-encontradas-container">
                                <span class="fotos-encontradas">Nenhuma fotografia encontrada</span>
                            </div>
                        </div>';
          }
          echo '</div>';
        }
        ?>
      </div>
    </div>
  </div>
</body>

</html>