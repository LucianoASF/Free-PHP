<?php
require_once "conecta.php";
$email = $_POST["email"];
$senha = sha1($_POST["senha"]);
$consulta = $conexao->prepare("SELECT * FROM usuarios WHERE email = ? AND senha = ?");
$consulta->bind_param("ss", $email, $senha);
$consulta->execute();
$consulta = $consulta->get_result();
$resultado = $consulta->fetch_array();
if ($consulta->num_rows != 1)
{
    Header("Location: erro.html");
}
else{
    session_start();
    $_SESSION["email"] = $email;
    $_SESSION["senha"] = $senha;
    $_SESSION["logado"] = 1;
    $_SESSION["id"] =  $resultado["id"];
    $_SESSION["perfil_id"] = $resultado["perfil_id"]; 
    Header("Location: home.php");
}
?>