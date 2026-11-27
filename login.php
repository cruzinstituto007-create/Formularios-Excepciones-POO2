<?php
require_once "auth-log.php";

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["entrar_invitado"])) {
        $_SESSION["usuario"] = "invitado";
        registrarLog("Acceso como invitado", "Modo invitado");
        header("Location: index.php");
        exit;
    }

    $userInput = trim($_POST["usuario"]);
    $passInput = trim($_POST["password"]);
    $valido = false;

    if (file_exists("datos/usuarios.txt")) {
        $lineas = file("datos/usuarios.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lineas as $linea) {
            $partes = explode(":", $linea);
            if (count($partes) == 2) {
                $u = trim($partes[0]);
                $p = trim($partes[1]);
                if ($u == $userInput && $p == $passInput) {
                    $valido = true;
                    break;
                }
            }
        }
    }

    if ($valido) {
        $_SESSION["usuario"] = $userInput;
        registrarLog("Login correcto", "Usuario: " . $userInput);
        header("Location: index.php");
        exit;
    } else {
        $_SESSION["usuario"] = "invitado";
        registrarLog("Login fallido", "Intento con usuario: " . $userInput);
        $mensaje = "Usuario o contraseña incorrectos.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <?php require_once "menu.php"; ?>

    <h1>Iniciar sesión</h1>

    <?php
    if ($mensaje != "") {
        echo "<p>" . $mensaje . "</p>";
    }
    ?>

    <form method="post" action="">
        <label>Usuario:</label>
        <input type="text" name="usuario" required>
        <br><br>
        <label>Contraseña:</label>
        <input type="password" name="password" required>
        <br><br>
        <button type="submit">Entrar</button>
    </form>

    <br>

    <form method="post" action="">
        <button type="submit" name="entrar_invitado" value="1">Continuar como invitado</button>
    </form>
</body>
</html>