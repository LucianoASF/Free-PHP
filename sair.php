<?php
require_once "verifica.php";
session_destroy();
header("Location: login.html");
?>