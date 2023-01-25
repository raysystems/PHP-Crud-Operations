<?php

//Conectar
$server = "localhost";
$username = "root";
$password = "";
$database = "crud";

$conectar = mysqli_connect($server,$username,$password,$database);
mysqli_set_charset($conectar,"utf8");
if(mysqli_connect_error()){
    echo "ERRO -> ".mysqli_connect_error();
}
?>