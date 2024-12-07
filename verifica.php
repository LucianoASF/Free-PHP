<?php
require_once "conecta.php";
session_start();
if ($_SESSION["logado"] == 0){
    Header("Location: login.html");
}