<?php
//Conectando o Banco de Dados com  a API PDO
//Criando uma de função de conexão com o Banco de Dados
function conectar()
{
    //Tratando Exceções com Try/catch
    try {
        $conn = new PDO("mysql:host=localhost; dbname=sistema_bempets", "root", "");
    } catch (PDOException $e) {
        echo $e->getMessage();
        echo $e->getCode();
    }
    return $conn;//Retorna a variável de conexão
}

?>