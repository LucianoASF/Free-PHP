<?php
    $conexao = new mysqli("localhost", "root", "", "free");
    if($conexao->connect_error){
        header("Location: erro.html");
    }