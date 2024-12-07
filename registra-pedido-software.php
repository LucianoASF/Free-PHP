<?php
require_once "verifica.php";
date_default_timezone_set('America/Sao_Paulo');
if ($_SESSION["perfil_id"] == 1){
    Header("Location: home.php");
}
if (isset($_POST['titulo']) && !empty(trim($_POST['titulo'])) && isset($_POST['descricao']) && !empty(trim($_POST['descricao']))){
    $data = date('Y-m-d');
    $id = $_SESSION['id'];
    $consulta = $conexao->prepare("INSERT INTO pedidos_de_software(titulo, descricao, data, cliente_id) VALUES (?, ?, ?, ?)");
 $consulta->bind_param("sssi", $_POST['titulo'],$_POST['descricao'], $data, $id);
 $consulta->execute();
}
Header("Location: home.php");

