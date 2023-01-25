<?php
require_once 'db_conectar.php';
session_start();

if (isset($_POST['btn-criar'])) {
    $nome = $_POST['nome'];
    $apelido = $_POST['apelido'];
    $email = $_POST['email'];
    $idade = $_POST['idade'];
    //Validacoes
    $erros = array();
    if (!is_string($nome)) {
        $erros[] = "#01 - Wrong Name Format!";
    }
    if (!is_string($apelido) or empty($apelido)) {
        $erros[] = "#02 - Wrong Name Format!";
    }
    if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
        $erros[] = "#03 - Wrong Email Format!";
    }
    if (!filter_var($idade,FILTER_VALIDATE_INT)) {
        $erros[] = "#04 - Wrong Age Format!";
    }
    if (!empty($erros)) {
        foreach ($erros as $erro) {
            echo "<br>".$erro;
        }
    } else {
        $nome = mysqli_escape_string($conectar,$_POST['nome']);
        $apelido = mysqli_escape_string($conectar,$_POST['apelido']);
        $email = mysqli_escape_string($conectar,$_POST['email']);
        $idade = mysqli_escape_string($conectar,$_POST['idade']);
        $sql = "INSERT INTO clientes (nome,apelido,email,idade) VALUES ('$nome','$apelido','$email','$idade')";
        if(mysqli_query($conectar,$sql)) {
            $_SESSION['mensagem'] = "Criado com Sucesso";
            header('Location: ../index.php');
        } else {
            $_SESSION['mensagem'] = "Erro ao Criar!";
            header('Location: ../index.php');
        }
    }
}


?>