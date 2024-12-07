<?php
    require_once "verifica.php";
    if ($_SESSION["perfil_id"] == 1){
        Header("Location: home.php");
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Free</title>
    <link rel="stylesheet" href="criar-pedido-software.css">
</head>
<body>
<div class="container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <h2>Menu</h2>
            <ul>
            <li><a href='home.php'>Home</a></li>
            <li><a href='pedidos-software-usuario.php'>Seus pedidos de software</a></li>

                <li><a href="sair.php">Sair</a></li>
            </ul>
        </aside>
        <div class="form-container">
        <h2>Criar pedido de software</h2>
        <form action="registra-pedido-software.php" method="post">
            <label for="titulo">Titulo:</label>
            <input type="text" id="titulo" name="titulo" required>
            <label for="descricao">Descrição:</label>
            <textarea name="descricao" id="descricao"></textarea>

            <button type="submit">Criar pedido de software</button>
        </form>
    </div>
</div>
</body>
</html>