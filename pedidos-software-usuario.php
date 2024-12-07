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
                <li><a href='home.php'>Home</a></li>
                <?php
                    if($_SESSION["perfil_id"] == 2){
                        echo "<li><a href='criar-pedido-software.php'>Criar pedido de software</a></li>";
                    } else{
                        echo "<li><a href='suas-candidaturas.php'>Suas candidaturas</a></li>";
                    }
                ?>
                <li><a href="sair.php">Sair</a></li>
            </ul>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <?php
            $id = $_SESSION["id"];
            if ($_SESSION["perfil_id"] == 2){

                $sql = "SELECT pedidos_de_software.id, titulo, nome, descricao, data, cliente_id, desenvolvedor_id FROM pedidos_de_software INNER JOIN usuarios ON pedidos_de_software.cliente_id = usuarios.id WHERE cliente_id = $id";
                $consulta = $conexao->query($sql);
                while ($linha = $consulta->fetch_assoc()){
                    echo "<div class='card'>";
                    echo  "<h3>".$linha['titulo']."</h3>";
                    if ($linha["desenvolvedor_id"] == NULL){
                        echo  "<p> Sem desenvolvedor ainda</p>";
                        echo "<a class='btn-azul' href='lista-candidatos.php?pedido_software_id=".$linha["id"]."'>Ver candidatos</a>";
                    }else {
                        $desenvolvedor_id = $linha["desenvolvedor_id"];
                        $query = $conexao->query("SELECT * FROM usuarios WHERE id = $desenvolvedor_id");
                        $query = $query->fetch_assoc();
                        echo  "<p> Desenvolvedor: ".$query['nome']."</p>";
                    }
                    echo "<p>".$linha['descricao']."</p>";
                    echo "<p>".$linha['data']."</p>";
                    echo "</div>";
                }
                
            }
            if ($_SESSION["perfil_id"] == 1){

                $sql = "SELECT pedidos_de_software.id, titulo, nome, descricao, data, cliente_id, desenvolvedor_id FROM pedidos_de_software INNER JOIN usuarios ON pedidos_de_software.cliente_id = usuarios.id WHERE desenvolvedor_id = $id";
                $consulta = $conexao->query($sql);
                while ($linha = $consulta->fetch_assoc()){
                    echo "<div class='card'>";
                    echo  "<h3>".$linha['titulo']."</h3>";
                    
                    echo  "<p> Cliente: ".$linha['nome']."</p>";
                    echo "<p>".$linha['descricao']."</p>";
                    echo "<p>".$linha['data']."</p>";
                    echo "</div>";
                }
                
            }
            ?>
            
        </main>
    </div>
</body>
</html>

