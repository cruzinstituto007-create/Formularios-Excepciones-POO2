<?php
require_once "auth-log.php";
$usuarioActual = $_SESSION["usuario"];

echo "<p>Usuario actual: <b>" . $usuarioActual . "</b> | ";

if ($usuarioActual == "invitado") {
    echo '<a href="/login.php">Ir a login</a>';
} else {
    echo '<a href="/cambiar-contraseña.php">Cambiar contraseña</a> | ';
    echo '<a href="/logout.php">Cerrar sesión</a>';
}
echo "</p>";

echo '<a href="/index.php">Principal</a> | ';
echo '<a href="/ejercicios/edad.php">Mayoría de edad</a> | ';
echo '<a href="/ejercicios/numeros.php">Números</a> | ';
echo '<a href="/ejercicios/calculadora-resultado.php">Calculadora</a> | ';
echo '<a href="/ejercicios/cal-cient-Resultado.php">Calculadora científica</a>';

if ($usuarioActual == "Admin") {
    echo ' | <a href="/ver-log.php">Ver log (Admin)</a>';
}

echo "</ul></nav>";
?>