<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION["usuario"])) {
    $_SESSION["usuario"] = "invitado";
}

function registrarLog($accion, $datos = "") {
    if (!is_dir("datos")) {
        mkdir("datos");
    }

    $usuario = $_SESSION["usuario"];
    $fecha = date("Y-m-d H:i:s");
    $linea = "[" . $fecha . "] Usuario: " . $usuario . " | Accion: " . $accion . " | Datos: " . $datos . "\n";

    file_put_contents("datos/operaciones.log", $linea, FILE_APPEND);
}