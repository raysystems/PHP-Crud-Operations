<?php
include_once 'includes/header.php';
include_once 'php_actions/db_conectar.php';
include_once 'includes/aviso.php';
?>   


<?php 
$sql= "SELECT COUNT(id) FROM clientes";
$resultado = mysqli_query($conectar,$sql);
$dados = mysqli_fetch_array($resultado);
if($dados[0]==0){
    $GLOBALS['txt'] = "<h4>Sem clientes a Registar ... </h4>";
    $GLOBALS['mostrar'] = "hide";
} else {
    $GLOBALS['txt'] = "";
    $GLOBALS['mostrar'] = "";
}
?>




<div class="row">

    <div class="col s12 m6 push-m3">
        <h3 class="light"> Clientes </h3>
        <table class="striped <?php echo $GLOBALS['mostrar']?>">
            <?php echo $GLOBALS['txt']?>
            <thead>
                <tr>
                    <th>Nome:</th>
                    <th>Apelido:</th>
                    <th>Email:</th>
                    <th>Idade:</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $sql = "SELECT * FROM clientes";
                $resultado = mysqli_query($conectar,$sql);
                while($dados = mysqli_fetch_array($resultado)){
                ?>
                <tr>
                    <td><?php echo $dados['nome']?></td>
                    <td><?php echo $dados['apelido']?></td>
                    <td><?php echo $dados['email']?></td>
                    <td><?php echo $dados['idade']?></td>
                    <td><a href="editar.php?id=<?php echo $dados['id']?>" class="btn-floating orange"> 
                    <i class="material-icons">edit</i>
                    </a>
                    </td>
                    <td><a href="php_actions/delete.php?id=<?php echo $dados['id']?>" class="btn-floating red">
                        <i class="material-icons">delete</i>
                    </a></td>
                </tr>
                <?php } ?>
                
            </tbody>
        </table>
        <br>
        <a href="adicionar.php" class="btn">Adicionar Registo</a>
    </div>

</div>



<?php
include_once 'includes/footer.php';
?>  