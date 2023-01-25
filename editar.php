<?php
include_once 'includes/header.php';
include_once 'php_actions/db_conectar.php';
session_start();
if(isset($_GET['id'])) {
    $_SESSION['id-post'] = $_GET['id'];
    
    $id = mysqli_escape_string($conectar,$_GET['id']);
    $sql = "SELECT * FROM clientes WHERE id = '$id'";
    $resultado = mysqli_query($conectar,$sql);
    $dados = mysqli_fetch_array($resultado);
}


if (isset($_POST['btn-cancelar'])) {
    $_SESSION['mensagem'] = "Cancelado com Sucesso! Cliente inalterado!";
    $_SESSION['tipo'] ="green";
    header('Location: index.php');
}


if (isset($_POST['btn-editar'])) {
    $nome = mysqli_escape_string($conectar, $_POST['nome']);
    $apelido = mysqli_escape_string($conectar, $_POST['apelido']);
    $email = mysqli_escape_string($conectar, $_POST['email']);
    $idade = mysqli_escape_string($conectar, $_POST['idade']);
    $id_ = $_SESSION['id-post'];
    $sql = "UPDATE clientes SET nome = '$nome', apelido = '$apelido', email = '$email', idade = '$idade' WHERE id = '$id_'";
    mysqli_query($conectar,$sql);
    $_SESSION['mensagem'] = "Editado com Sucesso! Cliente ".$nome." editado!";
    $_SESSION['tipo'] ="green";
    header('Location: index.php');

}


?>   

<div class="row">

    <div class="col s12 m6 push-m3">
        <h3 class="light"> Editando Cliente - <b> <?php echo $dados['nome'] ?> </b> </h3>
        <form action="editar.php" method="POST">
            <div class="input-field col s12">
                <input type="text" name="nome" id="nome" value="<?php echo $dados['nome']?>">
                <label for="nome">Nome</label>
            </div>
            <div class="input-field col s12">
                <input type="text" name="apelido" id="apelido" value="<?php echo $dados['apelido']?>">
                <label for="apelido">Apelido</label>
            </div>
            <div class="input-field col s12">
                <input type="email" name="email" id="email" value="<?php echo $dados['email']?>">
                <label for="email">Email</label>
            </div>
            <div class="input-field col s12">
                <input type="text" name="idade" id="idade" value="<?php echo $dados['idade']?>">
                <label for="idade">Idade</label>
            </div>
            <button class="btn green" name="btn-editar">Editar</button>
            <button class="btn red" name="btn-cancelar">Cancelar e Voltar</button>
        </form>
    </div>

</div>





<?php
include_once 'includes/footer.php';
?>  