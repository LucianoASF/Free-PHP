<?php
require_once "verifica.php";
date_default_timezone_set('America/Sao_Paulo');
if ($_SESSION["perfil_id"] == 2){
    Header("Location: home.php");
}
if (isset($_GET["id_pedido_software"])){
    $id = (int)$_GET["id_pedido_software"];
    $sql = "SELECT * FROM pedidos_de_software WHERE id = $id";
    $consulta = $conexao->query($sql);
    if ($consulta->num_rows == 1){
        $linha = $consulta->fetch_assoc();
        if($linha["desenvolvedor_id"] == NULL){
            $desenvolvedor_id = $_SESSION['id'];
            $data = date('Y-m-d');
            $consulta = $conexao->prepare("INSERT INTO candidata(usuario_id, pedidos_de_software_id, data_candidatura) VALUE (?, ?, ?)");
            $consulta->bind_param("iis", $desenvolvedor_id, $id, $data);
            $consulta->execute();
        }
    } else{
        Header("Location: erro.html");
    }    
}
Header("Location: home.php");