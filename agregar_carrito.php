<?php
session_start();

$id = (int)$_POST["id"];

if (!isset($_SESSION["carrito"])) {
    $_SESSION["carrito"] = [];
}

if (isset($_SESSION["carrito"][$id])) {
    $_SESSION["carrito"][$id]++;   // Si ya existe, aumenta la cantidad
} else {
    $_SESSION["carrito"][$id] = 1; // Si no existe, lo agrega con cantidad 1
}

echo "ok";
?>