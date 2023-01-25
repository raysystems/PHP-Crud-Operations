<?php
require_once 'db_conectar.php';
session_start();
if(isset($_GET['id'])){
    $id = mysqli_escape_string($conectar,$_GET['id']);
    $sql = "DELETE FROM clientes WHERE id = '$id'";   
    mysqli_query($conectar,$sql);  
    $_SESSION['mensagem'] = "Cliente Apagado com sucesso!";
    $_SESSION['tipo'] = "red";
    header('Location: ../index.php');
}






?>