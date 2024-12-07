<?php
require_once "verifica.php";
if ($_SESSION["perfil_id"] == 1){
    Header("Location: home.php");
}
if (isset($_GET["pedido_software_id"])){
    $pedido_software = (int)$_GET["pedido_software_id"];
    $id_cliente = $_SESSION["id"];
    $sql = "SELECT * FROM pedidos_de_software INNER JOIN usuarios ON cliente_id = usuarios.id WHERE pedidos_de_software.id = $pedido_software AND usuarios.id = $id_cliente";
    $consulta = $conexao->query($sql);
    if ($consulta->num_rows == 0){
        Header("Location: home.php");
    }
} else{
    Header("Location: home.php");
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Free</title>
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="datatable.css">
</head>
<body>
    <div class="container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <h2>Menu</h2>
            <ul>
                <li><a href='pedidos-software-usuario.php'>Ver seus pedidos de software</a></li>

                <?php
                    if($_SESSION["perfil_id"] == 2){
                        echo "<li><a href='criar-pedido-software.php'>Criar pedido de software</a></li>";
                    }
                ?>
                <li><a href="sair.php">Sair</a></li>
            </ul>
        </aside>
        <div class="container2">
        <h1>Candidatos</h1>
        <?php
            $query = "SELECT nome, data_candidatura, id, pedidos_de_software_id FROM usuarios INNER JOIN candidata ON usuarios.id = usuario_id AND pedidos_de_software_id = $pedido_software";
            $query = $conexao->query($query);
            if ($query->num_rows == 0){
                echo "<h2 id='nenhum'>Nenhuma candidatura ainda!</h2>";
            } else{
                echo "<table>";
                echo    "<thead>";
                echo        "<tr>";
                echo            "<th>Nome</th>";
                echo            "<th>Data Candidatura</th>";
                echo            "<th>Ações</th>";
                echo        "</tr>";
                echo    "</thead>";
                echo    "<tbody>";
                while ($linha = $query->fetch_assoc()){
                    echo "<tr>";
                    echo    "<td>".$linha["nome"]."</td>";
                    echo    "<td>".$linha["data_candidatura"]."</td>";
                    echo    "<td><a href='aceita-candidato.php?desenvolvedor_id=".$linha["id"]."&pedido_software_id=".$linha["pedidos_de_software_id"]."'>Aceitar candidato</a></td>";
                    echo "</tr>";
                }
                echo "</tbody>";
                echo "</table>";
            }
        ?>
        
    </div>
    </div>
</body>
</html>