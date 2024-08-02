<?php
session_start();
?>

<!DOCTYPE html>

<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="assets/css/estilos2.css" />

  <link rel="shortcut icon" href="assets/img/feline-track_2047.png" type="image/x-icon" />
  <title>BemPets - Cuidadores de Animais</title>
  <style>
    .esqueci {
      text-decoration: none;
      color: #333;
      margin-top: 15px;
      font-size: 14px;
    }

    .esqueci:hover {
      color: blue;
    }
  </style>

</head>

<body>

  <div class="container">
    <div class="forms-container">
      <div class="signin-signup">
<?php

if (isset($_SESSION['nao_autenticado'])):

?>
<!--Menssagem de erro -->
<div class="notification is-danger" align="center">
<p style="color:red">ERRO: Usuário ou senha inválidos.</p>
</div>

<?php
endif; //Fechando o IF

//Destruindo a sessão não_autenticado
unset($_SESSION['nao_autenticado']);
?>

        <form action="scriptlogin.php" method="post" class="sign-in-form">
          <h2 class="title">Fazer Login</h2>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="email" name="email" id="email" placeholder="Email" />
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" name="senha" id="senha" placeholder="Senha" />
          </div>
          <input type="submit" value="Login" class="btn solid" />

          <p class="social-text">Ou</p>
          <div class="social-media">
            <a href="#" class="social-icon">
              <i class="fab fa-google"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-facebook-f"></i>
            </a>
          </div>
          <a href="esqueci-senha.html" class="esqueci">
            <p>Esqueci minha senha?</p>
          </a>
        </form>

    <!--Verificar se a sessão cadastrado existe-->
    <?php
    if (isset($_SESSION['cadastrado'])):
        ?>
        <!--Mensagem de usuário cadastrado-->
        <div class="notification is-danger" align="center">
            <p style="color:#000">Usuário cadastrado com sucesso! </p>
        </div>

        <?php
    endif;

    unset($_SESSION['cadastrado']);
    ?>

    <!--Verificar se a sessão nao_cadastrado existe-->
    <?php
    if (isset($_SESSION['nao_cadastrado'])):
        ?>
        <!--Mensagem de usuário cadastrado-->
        <div class="notification is-danger" align="center">
            <p style="color:#f00">Erro: e-mail já cadastrado! </p>
        </div>

        <?php
    endif;

    unset($_SESSION['nao_cadastrado']);
    ?>
        <form action="scriptcadastro.php" method="post" id="forCad" class="sign-up-form">
          <h2 class="title">Cadastre-se</h2>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="'text'" name="nome" id="nome" placeholder="Nome" />
          </div>
          <div class="input-field">
            <i class="fas fa-envelope"></i>
            <input type="email" name="email" id="email" placeholder="Email" />
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" name="senha" id="senha" placeholder="Senha" />
          </div>
          <div class="input-field">
            <i class="fas fa-phone"></i>
            <input type="tel" name="telefone" id="telefone" placeholder="Telefone" />
          </div>

          <!-- Usúario -->
          <div class="col-12 mt-4">
            <select class="form-select" name="painel" id="">
              <option selected>Selecione um usúario</option>
              <option value="cuidador">Cuidador</option>
              <option value="tutor">Tutor</option>
            </select>
          </div>
          <input type="submit" class="btn" value="Cadastre-se" />
          <p class="social-text">Ou</p>
          <div class="social-media">
            <a href="#" class="social-icon">
              <i class="fab fa-google"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-facebook-f"></i>
            </a>

          </div>
        </form>
      </div>
    </div>

    <div class="panels-container">
      <div class="panel left-panel">
        <div class="content">
          <h3>Novo aqui?</h3>
          <p>
            Registre-se com seus dados pessoais para usar todos os recursos do nosso site.
          </p>
          <button class="btn transparent" id="sign-up-btn">
            Cadastre-se
          </button>
        </div>
        <img src="assets/img/homemecachorro.svg" class="image" alt="" />
      </div>
      <div class="panel right-panel">
        <div class="content">
          <h3>É bom ter você de volta!</h3>
          <p>
            Acesse sua conta para usar todos os recursos do nosso site.
          </p>
          <button class="btn transparent" id="sign-in-btn">
            Acessar
          </button>
        </div>
        <img src="assets/img/mulher-e-cao.svg" class="image" alt="" />
      </div>
    </div>
  </div>

  <script src="assets/js/app.js"></script>
</body>

</html>