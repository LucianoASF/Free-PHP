<?php
require_once "verifica.php";
if ($_SESSION["perfil_id"] == 1){
    Header("Location: home.php");
}
if (!isset($_GET["desenvolvedor_id"]) || !isset($_GET["pedido_software_id"])){
    Header("Location: home.php");
}
$id_pedido_software = (int)$_GET["pedido_software_id"];
$id_desenvolvedor = (int)$_GET["desenvolvedor_id"];
$id_cliente = $_SESSION["id"];
$sql = "SELECT * FROM pedidos_de_software WHERE id = $id_pedido_software AND cliente_id = $id_cliente";
$consulta = $conexao->query($sql);
if ($consulta->num_rows == 0){
    Header("Location: home.php");
}
$sql = "UPDATE pedidos_de_software SET desenvolvedor_id = $id_desenvolvedor  WHERE (id = $id_pedido_software)";
$consulta = $conexao->query($sql);
Header("Location: pedidos-software-usuario.php");
?>