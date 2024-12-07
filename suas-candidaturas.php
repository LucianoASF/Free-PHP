<?php
require_once "verifica.php";
if ($_SESSION["perfil_id"] == 2){
    Header("Location: hoe.php");
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Free</title>
    <link rel="stylesheet" href="home.css">
</head>
<body>
    <div class="container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <h2>Menu</h2>
            <ul>
                <li><a href='home.php'>Home</a></li>
                <li><a href='pedidos-software-usuario.php'>Ver seus pedidos de software</a></li>
                <li><a href="sair.php">Sair</a></li>
            </ul>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <?php
            $id_usuario = $_SESSION['id'];
            $sql = "SELECT * FROM candidata INNER JOIN pedidos_de_software ON pedidos_de_software_id = id WHERE usuario_id = $id_usuario";
            $consulta = $conexao->query($sql);
            while ($linha = $consulta->fetch_assoc()){
                echo "<div class='card'>";
                echo  "<h3>".$linha['titulo']."</h3>";
                echo "<p>".$linha['descricao']."</p>";
                echo "<p>".$linha['data']."</p>";
                
                echo "</div>";
            }

            ?>
            
        </main>
    </div>
</body>
</html>

