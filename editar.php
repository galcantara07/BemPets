<?php
//Iniciando o código de Back-End do Formulário para Edição de Registros 

session_start();
ob_start(); //Limpando o Buffer de saída no redirecionamento

// 1 - Chamando a conexão com o banco de dados
include("conexao.php");
$conn = conectar();

// 2 - Receber o id do usuário através da URL, utilizando o metodo GET
$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

// 3 - Verificando se existe um id. Caso não exista , retornar para o listar2.php

// Verifica se uma variável é vazia. A função empty retornará true (verdadeiro) quando uma variável for vazia e false (falso) quando uma variável não for vazia.
if (empty($id)) {
    $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Usuário não encontrado<p>";
    header("location: listar.php");
}

// 4 - Pesquisando no Banco de Dados pelo id do usuário selecionado.
$query_usuario = "SELECT id, nome, email, painel FROM usuarios WHERE id = $id LIMIT 1";

// 5 - Preparando a Query
$result_usuario = $conn->prepare($query_usuario);

// 6 - Executando a Query
$result_usuario->execute();

// 7 - Verificando se encontrou usuários no banco de dados.
if (($result_usuario) and ($result_usuario->rowCount() != 0)) {

    //Armazena os dados em um Array Associativo
    $row_usuario = $result_usuario->fetch(PDO::FETCH_ASSOC);
} else {

    //Criar a SESSION de mensagem de erro.
    $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Usuário não encontrado</p>";
    header("location: listar.php");
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edição de Registros</title>

    <style>
        .edicao {
            width: 100%;
            max-width: 500px;
            margin: 10px auto;
            background-color: #ffb552;
            padding: 20px;
            border-radius: 5px;
            margin-top: 15px;
            font-family: Arial, Helvetica, sans-serif;
        }

        input {
            width: 70%;
            padding: 10px 5px;
            border-radius: 5px;
            outline-color: #cdf;
        }

        .atualizar {
            text-align: center;
        }

        label {
            font-weight: bold;
        }

        header {
            text-align: center;
            padding-bottom: 20px;
            padding-top: 20px;
        }
    </style>
</head>

<body>

    <?php
    // 8 - Recebendo os dados do formulário através do metodo POST e armazenar em uma variável de vetor
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    //var_dump($dados);//Verificar se os dados foram recebido do formulário com sucesso.

    // 9 - Verificando se o usuário clicou no botão "Atualizar"
    if (!empty($dados['EditUsuario'])) {

        // Aplicando algumas validações
        $empty_input = false;

        // Retirando espaços em branco no início e no final
        array_map('trim', $dados);

        // 10 - Verificando se há campo em branco
        if (in_array("", $dados)) {

            $empty_input = true;
            echo "<p style='color: #f00; text-align: center;'>Erro: Necessário preencher todos os campos!</p>";

            // 11 - Verificando se a estrutura de e-mail informada pelo usuário é válida.
        } elseif (!filter_var($dados['email'], FILTER_VALIDATE_EMAIL)) {

            $empty_input = true;
            echo "<p style='color: #f00;'>Erro: Necessário preencher com e-mail válido!</p>";
        }

        // 12 - Verificando se não há erros. Se verdadeiro atualizar o banco de dados
        if (!$empty_input) {

            //Implementar o UPDATE no Banco de Dados
            $query_up_usuario = "UPDATE usuarios SET nome=:nome, email=:email, painel=:painel WHERE id=:id";

            //Preparando a query
            $edit_usuario = $conn->prepare($query_up_usuario);

            //13 - Passando os valores do vetor de $dados para os pseudo-nomes
            $edit_usuario->bindParam(':nome', $dados['nome'], PDO::PARAM_STR);
            $edit_usuario->bindParam(':email', $dados['email'], PDO::PARAM_STR);
            $edit_usuario->bindParam(':painel', $dados['painel'], PDO::PARAM_STR);
            $edit_usuario->bindParam(':id', $id, PDO::PARAM_INT);

            //14 - Verificando se a execução da query foi realizada com sucesso!
            if ($edit_usuario->execute()) {

                $_SESSION['msg'] = "<p style='color: green; text-align: center;'>Usuário atualizado com sucesso!</p>";
                header("location: listar.php");
            } else {

                echo "<p style='color: #f00;'>Erro: Usuário não atualizado com sucesso!</p>";
            }
        }
    }
    ?>
    <header>
        <h1>Editar Registros</h1>
    </header><br><br>

    <!-- 11 - Criando o formulário para editar os registros-->
    <div class="edicao">
        <form action="" method="POST">



            <label>Nome: </label>
            <input type="text" name="nome" id="nome" placeholder="Nome completo" value="<?php

                                                                                        //Verificando se veio dados do usuário pelo formulário. Se verdadeiro, manter os dados do usário. 
                                                                                        if (isset($dados['nome'])) {
                                                                                            echo $dados['nome'];

                                                                                            //Mostrando no campo matrícula o valor matrícula que veio do Banco de Dados
                                                                                        } elseif (isset($row_usuario['nome'])) {
                                                                                            echo $row_usuario['nome'];
                                                                                        }

                                                                                        ?>"><br><br>

            <label>E-mail: </label>
            <input type="email" name="email" placeholder="Digite o melhor e-mail" value="<?php

                                                                                            //Verificando se veio dados do usuário pelo formulário. Se verdadeiro, manter os dados do usário. 
                                                                                            if (isset($dados['email'])) {
                                                                                                echo $dados['email'];

                                                                                                //Mostrando no campo matrícula o valor matrícula que veio do Banco de Dados
                                                                                            } elseif (isset($row_usuario['email'])) {
                                                                                                echo $row_usuario['email'];
                                                                                            }

                                                                                            ?>"><br><br>

            <label>Painel: </label>
            <input type="text" name="painel" id="painel" value="<?php

                                                                //Verificando se veio dados do usuário pelo formulário. Se verdadeiro, manter os dados do usário. 
                                                                if (isset($dados['painel'])) {
                                                                    echo $dados['painel'];

                                                                    //Mostrando no campo matrícula o valor matrícula que veio do Banco de Dados
                                                                } elseif (isset($row_usuario['painel'])) {
                                                                    echo $row_usuario['painel'];
                                                                }

                                                                ?>"><br><br><br>

            <label>Telefone: </label>
            <input type="int" name="telefone" id="telefone" placeholder="Digite seu telefone" value="<?php

                                                                                                        //Verificando se veio dados do usuário pelo formulário. Se verdadeiro, manter os dados do usário. 
                                                                                                        if (isset($dados['telefone'])) {
                                                                                                            echo $dados['telefone'];

                                                                                                            //Mostrando no campo matrícula o valor matrícula que veio do Banco de Dados
                                                                                                        } elseif (isset($row_usuario['telefone'])) {
                                                                                                            echo $row_usuario['telefone'];
                                                                                                        }

                                                                                                        ?>"> <br><br>

            <div class="atualizar">
                <input type="submit" value="Atualizar" name="EditUsuario">
            </div>
        </form>
    </div>
    <!--Fím do formulário-->
</body>

</html>