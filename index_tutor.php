<?php
session_start();//Iniciando a sessão

//Verificando se existi um usuário logado
include ('scriptverificalogin.php');

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
  <link rel="stylesheet" href="assets/css/styles.css" />
  <link rel="stylesheet" href="assets/css/textmedia.css">
  <link rel="shortcut icon" href="assets/img/feline-track_2047.png" type="image/x-icon" />


  <title>BemPets - Cuidadores de Animais</title>
  <style>
    .bg-1 {
      background: url(assets/img/image-1.jpg) no-repeat;
      background-size: cover;
      min-height: 90vh;
      opacity: 0.9;
    }

    /* .bg-footer {
        background: url(assets/img/footer.png) no-repeat;
        background-size: cover;
        min-height: 50vh;
        opacity: 0.9;
      } */
  </style>
</head>

<body>
  <!-- Cabeçalho -->
  <header>
    <!-- Barra de navegação -->
    <nav class="navbar navbar-expand-lg navbar-light text-center">
      <div class="container-fluid">
        <!-- Logomarca -->
        <a class="navbar-brand" href="#">
          <img src="assets/img/Group 2 1.png" alt="Logomarca" class="logo ms-4" />
        </a>

        <!-- Botão de menu -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">

          <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse nav justify-content-center" id="navbarSupportedContent">
          <ul class="nav justify-content-center nav-underline mr-auto">
            <!-- <li class="nav-item active">
              <a class="nav-link" aria-current="page" href="index-logado.html">Início
              </a>
            </li> -->
            <!-- 
            <li class="nav-item">
              <a class="nav-link" href="encontrar.html">Encontrar um cuidador</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="cuidador.html">Ser um cuidador</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contatos.html">Contatos</a>
            </li> -->
            <li class="nav-item ms-5 mt-1">
            </li>
          </ul>
        </div>
        <div>

          <ul class="nav nav-pills mb-2 me-5">

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                aria-expanded="false">Tutor</a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Editar perfil</a></li>
                <li><a class="dropdown-item" href="cadastrar_pets.php">Cadastrar pets</a></li>
                <li><a class="dropdown-item" href="login_cadastro.php">Sair</a></li>

              </ul>
            </li>

          </ul>
        </div>

        <!-- Botão de login -->
        <!-- <div class="me-5">
          <a href="login.html"><button type="submit" class="btn btn-primary me-5">
              Fazer Login
            </button></a>
        </div> -->
      </div>
    </nav>
  </header>
  <!-- Fim do Cabeçalho -->

  <!-- Conteúdo da página -->
  <main class="conteudo">
    <!-- Seção 1 (Apresentação) -->
    <section class="container-fluid bg-1 text-white bg-dark text-lg-start text-wight at-5">
      <div class="container p-0">
        <div class="row">
          <!-- Coluna 1 (Texto) -->
          <div class="col-lg-6 text-center col-12 fundo">
            <h1 class="mt-0">
              Cuide do bem-estar do seu amiguinho com a BemPets
            </h1>
            <p class="lead paragrafo">
              BemPets é a plataforma ideal para conectar donos de animais com
              cuidadores qualificados. Cadastre-se, encontre cuidadores de
              confiança e gerencie todos os cuidados do seu pet em um só
              lugar. Simplifique a rotina e garanta o melhor cuidado para seu
              amiguinho.
            </p>
            <div class="d-flex justify-content-center">
              <a href="encontrar_logado_tutor.html">
                <button class="botao-encontrar">
                  Encontrar um Cuidador
                </button>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Seção 2 (Ser cuidador) -->
    <section class="container-fluid secao-2 mt-5 mb-5 pb-3">
      <div class="container">
        <div class="div pb-5 row">
          <div class="col-lg-6 col-12 mt-5">
            <img src="assets/img/foto2.png" class="mt-5 img-fluid" />
          </div>
          <div class="col-lg-6 col-12 mt-5 ">
            <h1 class="text-center">
              Junte-se a nós e transforme sua paixão por animais em momentos
              inesquecíveis!
            </h1>
            <p class="text-white paragrafo">
              Como cuidador, você terá a oportunidade única de proporcionar
              amor, cuidado e carinho a nossos amigos de quatro patas, unindo
              corações apaixonados por animais e promovendo histórias de
              amizade e bem-estar.
            </p>

            

          
          </div>
        </div>
      </div>
    </section>
    <!-- Seção 3 (Encontrar cuidador) -->
    <section class="container-fluid  mt-0" id="secao-3">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-12">
            <h1>Encontre um Cuidador para Seu Amiguinho</h1>
            <p class="paragrafo">
              No BemPets, sabemos o quanto seu animal de estimação é
              importante para você. É por isso que conectamos você com
              cuidadores de confiança que tratam seus amigos peludos com todo
              o carinho e atenção que eles merecem.
            </p>

            <div class="cuidador">
              <h3>Cuidadores Qualificados e Verificados</h3>
              <img src="assets/img/seta-para-baixo.png" alt="" width="5%" />
              <p class="paragrafo">
                Todos os nossos cuidadores passam por um rigoroso processo de
                verificação e são avaliados regularmente para garantir a
                qualidade do serviço.
              </p>
            </div>

            <div class="cuidador">
              <h3>Serviços Personalizados</h3>
              <img src="assets/img/seta-para-baixo.png" alt="" width="5%" />
              <p class="paragrafo">
                Encontre cuidadores que oferecem uma ampla gama de serviços,
                desde passeios diários até hospedagem e cuidados especiais,
                adaptados às necessidades do seu pet.
              </p>
            </div>

            <div class="cuidador">
              <h3>Flexibilidade e Conveniência</h3>
              <img src="assets/img/seta-para-baixo.png" alt="" width="5%" />
              <p class="paragrafo">
                Agende os serviços conforme sua necessidade e disponibilidade.
                Nossos cuidadores estão aqui para ajudar, seja para uma única
                tarde ou uma viagem prolongada.
              </p>
            </div>

            <div class="cuidador">
              <h3>Feedback e Avaliações</h3>
              <img src="assets/img/seta-para-baixo.png" alt="" width="5%" />
              <p class="paragrafo">
                Leia as avaliações e comentários de outros donos de animais
                para escolher o cuidador perfeito para o seu pet. Confiança e
                transparência são nossa prioridade.
              </p>
            </div>
          </div>
          <div class="col-lg-6 col-12">
            <img src="assets/img/caoegatocell.png" alt="" width="70%" class="caoegato img-fluid" />
          </div>
        </div>
      </div>
    </section>

    <!-- Uma seção de carousel (slides)
    <section class="container-fluid">
      <div class="container">
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="..." class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="..." class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="..." class="d-block w-100" alt="...">
            </div>
          </div>
        </div>
      </div>
    </section> -->
  </main>

  <!-- Rodapé -->
  <footer class="">
    <div class="container-fluid pt-4 text-center">
      <div class="container ">
        <div class="row ">
          <div class="col-12">
            <!-- Logomarca -->
            <a class="" href="#">
              <img src="assets/img/Group 2 1.png" alt="Logomarca" width="10%" />
            </a>
          </div>

        </div>
      </div>
    </div>
    <div class="row text-center">
      <p>&copy;Todos os direitos reservados</p>
    </div>
  </footer>

  <script src="assets/js/index.js"></script>
  <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>