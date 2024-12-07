<?php
require_once "verifica.php";
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
                <li><a href='pedidos-software-usuario.php'>Ver seus pedidos de software</a></li>
                <?php
                    if($_SESSION["perfil_id"] == 2){
                        echo "<li><a href='criar-pedido-software.php'>Criar pedido de software</a></li>";
                    } else{
                       echo "<li><a href='suas-candidaturas.php'>Ver suas candidaturas</a></li>";
                    }
                ?>
                <li><a href="sair.php">Sair</a></li>
            </ul>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <?php
            $sql = "SELECT pedidos_de_software.id, titulo, nome, descricao, data, cliente_id, desenvolvedor_id FROM pedidos_de_software INNER JOIN usuarios ON pedidos_de_software.cliente_id = usuarios.id";
            $consulta = $conexao->query($sql);
            while ($linha = $consulta->fetch_assoc()){
                echo "<div class='card'>";
                echo  "<h3>".$linha['titulo']."</h3>";
                echo  "<p> Cliente: ".$linha['nome']."</p>";
                echo "<p>".$linha['descricao']."</p>";
                echo "<p>".$linha['data']."</p>";
                if ($_SESSION["perfil_id"] == 1 && $linha["desenvolvedor_id"] == NULL){
                    $id_usuario = $_SESSION['id'];
                    $id_pedido_software = $linha['id'];
                    $query = $conexao->query("SELECT * FROM candidata where usuario_id = $id_usuario AND pedidos_de_software_id = $id_pedido_software");
                    if ($query->num_rows == 0){
                        echo "<a class='btn-azul' href='candidatar-projeto.php?id_pedido_software=".$linha["id"]."'>Candidatar</a>";
                    }
                }
                echo "</div>";
            }

            ?>
            
        </main>
    </div>
</body>
</html>

