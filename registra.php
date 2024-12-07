<?php
require_once "conecta.php";
if (isset($_POST['role']) && !empty(trim($_POST['role'])) && isset($_POST['senha']) && !empty(trim($_POST['senha']))){
    $perfil_id = (int)$_POST['role'];
    $senha = sha1($_POST['senha']);
    $consulta = $conexao->prepare("INSERT INTO usuarios(nome, email, senha, perfil_id) VALUES
    (?, ?, ?, ?)");
    $consulta->bind_param("sssi", $_POST['nome'],$_POST['email'], $senha, $perfil_id);
    $consulta->execute();
}
Header("Location: login.html");