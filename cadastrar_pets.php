<?php
session_start()

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

    .background-form {
      background-color: #d4b3e4;
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
  <!-- Conteúdo da página -->
  <main class="conteudo">
    <center>
      <div class="container-fluid mt-5">
        <h1 class="text-center">Vamos cadastrar seu pet</h1>
        <form class="row g-3 mt-4" action="scriptcad_pets.php" method="post">
          <div class="container pt-5 pb-5 mt-2 mb-5 background-form rounded-5">
            <br>
            <div class="col-md-4">
              <label for="tipo_pet" class="form-label">Tipo</label>
              <select class="form-select" name="tipo_pet" id="tipo_pet" required>
                <option selected disabled value="">Escolha</option>
                <option>Cachorro</option>
                <option>Gato</option>
              </select>
            </div>
            <br>
            <div class="col-md-4">
              <label for="nome_pet" class="form-label">Nome</label>
              <input type="text" name="nome_pet" class="form-control" id="nome_pet" value="" required>
            </div>
            <br>
            <div class="col-md-4">
              <label for="genero_pet" class="form-label">Gênero</label>
              <select class="form-select" name="genero_pet" id="genero_pet" required>
                <option selected disabled value="">Escolha</option>
                <option>Macho</option>
                <option>Fêmea</option>
              </select>
            </div>
            <br>
            <div class="col-md-4">
              <label for="raca_pet" class="form-label">Raça</label>
              <select class="form-select" name="raca_pet" id="raca_pet" required>
                <option selected disabled value="">Escolha</option>
                <option>Poodle</option>
                <option>SRD</option>
                <option>Buldogue</option>
                <option>Pastor alemão</option>
                <option>Shitzu</option>
                <option>Beagle</option>
              </select>
            </div>
            <br>
            <div class="col-md-4">
              <label for="idade_pet" class="form-label">Idade</label>
              <input type="text" name="idade_pet" class="form-control" id="idade_pet" value="" required>
            </div>
            <br>
            <div class="col-md-4">
              <label for="peso_pet" class="form-label">Peso</label>
              <input type="text" name="peso_pet" class="form-control" id="peso_pet" value="Kg" required>
            </div>
            <br>
            <div class="col-md-4">
              <label for="castrado_pet" class="form-label">Castrado</label>
              <select class="form-select" name="castrado_pet" id="castrado_pet" required>
                <option selected disabled value="">Escolha</option>
                <option>Sim</option>
                <option>Não</option>
              </select>
            </div>
            <br>
            <div class="col-md-4">
              <label for="vacina_pet" class="form-label">Vacina em dia</label>
              <select class="form-select" name="vacina_pet" id="vacina_pet" required>
                <option selected disabled value="">Escolha</option>
                <option>Sim</option>
                <option>Não</option>
              </select>
            </div>
            <br>
        </form>
        <div class="col-12 pt-3">
          <button type="submit" class="btn btn-primary">Cadastrar</button>
        </div>
        </form>
      </div>
      </div>
    </center>
  </main>

  <script src="assets/js/index.js"></script>
  <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>