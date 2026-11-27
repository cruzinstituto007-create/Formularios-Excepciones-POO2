<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Calculadora</title>
    <link rel="stylesheet" href="/estilo.css">
</head>
<body>
    <?php require_once __DIR__ . "/../menu.php"; ?>

    <h1>Calculadora</h1>

    <form method="post" action="">
        <label>Número 1:</label>
        <input type="number" step="any" name="num1" required>
        <br><br>
        <label>Número 2:</label>
        <input type="number" step="any" name="num2" required>
        <br><br>
        <button type="submit">Calcular</button>
    </form>

    <br>

    <?php
    require_once __DIR__ . "/calculadora-base.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $num1 = (float)$_POST["num1"];
        $num2 = (float)$_POST["num2"];

        try {
            $calc = new Calculadora($num1, $num2);
            echo "Suma: " . $calc->sumar() . "<br>";
            echo "Resta: " . $calc->restar() . "<br>";
            echo "Multiplicación: " . $calc->multiplicar() . "<br>";
            echo "División: " . $calc->dividir() . "<br>";
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    ?>
</body>
</html>