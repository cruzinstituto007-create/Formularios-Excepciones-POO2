<?php
require_once "auth-log.php";

if ($_SESSION["usuario"] == "invitado") {
    header("Location: login.php");
    exit;
}

$mensaje = "";
$usuarioActual = $_SESSION["usuario"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $actual = trim($_POST["actual"]);
    $nueva = trim($_POST["nueva"]);

    if ($nueva == "") {
        $mensaje = "La nueva contraseña no puede estar vacía.";
    } elseif (file_exists("datos/usuarios.txt")) {
        $lineas = file("datos/usuarios.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $encontrado = false;
        $textoFinal = "";

        foreach ($lineas as $linea) {
            $partes = explode(":", $linea);
            if (count($partes) == 2) {
                $u = trim($partes[0]);
                $p = trim($partes[1]);
                if ($u == $usuarioActual && $p == $actual) {
                    $textoFinal = $textoFinal . $u . ":" . $nueva . "\n";
                    $encontrado = true;
                } else {
                    $textoFinal = $textoFinal . $u . ":" . $p . "\n";
                }
            }
        }

        if ($encontrado) {
            file_put_contents("datos/usuarios.txt", $textoFinal);
            registrarLog("Cambio de contraseña", "Contraseña actualizada");
            $mensaje = "Contraseña actualizada correctamente.";
        } else {
            registrarLog("Intento de cambio de contraseña fallido", "Contraseña actual incorrecta");
            $mensaje = "La contraseña actual no es correcta.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cambiar contraseña</title>
</head>
<body>
    <?php require_once "menu.php"; ?>
    <h1>Cambiar contraseña</h1>
    <?php
    if ($mensaje != "") {
        echo "<p>" . $mensaje . "</p>";
    }
    ?>
    <form method="post" action="">
        <label>Contraseña actual:</label>
        <input type="password" name="actual" required>
        <br><br>
        <label>Nueva contraseña:</label>
        <input type="password" name="nueva" required>
        <br><br>
        <button type="submit">Guardar contraseña</button>
    </form>
</body>
</html>