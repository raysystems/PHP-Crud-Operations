<?php
session_start();
require_once 'db_conectar.php';
function clear($input) {
    global $conectar;
    $var = mysqli_escape_string($conectar,$input);
    // xss
    $var = htmlspecialchars($var);

    return $var;
}

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
        $nome = clear($_POST['nome']);
        $apelido = clear($_POST['apelido']);
        $email = clear($_POST['email']);
        $idade = clear($_POST['idade']);
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