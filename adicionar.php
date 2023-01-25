<?php
include_once 'includes/header.php';
?>   


<div class="row">

    <div class="col s12 m6 push-m3">
        <h3 class="light"> Adicionar Novo Cliente Em Registo </h3>
        <form action="php_actions/criar.php" method="POST">
            <div class="input-field col s12">
                <input type="text" name="nome" id="nome">
                <label for="nome">Nome</label>
            </div>
            <div class="input-field col s12">
                <input type="text" name="apelido" id="apelido">
                <label for="apelido">Apelido</label>
            </div>
            <div class="input-field col s12">
                <input type="email" name="email" id="email">
                <label for="email">Email</label>
            </div>
            <div class="input-field col s12">
                <input type="text" name="idade" id="idade">
                <label for="idade">Idade</label>
            </div>
            <button class="btn blue" name="btn-criar">Adicionar</button>
            <a href="index.php" class="btn">Lista de Registos</a>
        </form>
    </div>

</div>



<?php
include_once 'includes/footer.php';
?>  