<?php
require_once "auth-log.php";

if ($_SESSION["usuario"] != "Admin") {
    registrarLog("Acceso denegado a ver-log.php", "Usuario no es Admin");
    echo "Acceso denegado. Esta página es solo para Admin.";
    exit;
}

$contenidoLog = "No hay registros todavía.";
if (file_exists("datos/operaciones.log")) {
    $contenidoLog = file_get_contents("datos/operaciones.log");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Log de operaciones</title>
</head>
<body>
    <?php require_once "menu.php"; ?>
    <h1>Log de operaciones (Admin)</h1>
    <pre><?php echo $contenidoLog; ?></pre>
</body>
</html>