<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>MAYOR DE EDAD</title>
</head>
<body>
    <?php require "../menu.php"; ?>

    <h1>Comprobar edad</h1>

    <form method="post" action="">
        <label>Introduce tu edad:</label>
        <input type="number" name="edad" required>
        <button type="submit">Comprobar</button>
    </form>

    <br>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $edad = $_POST["edad"];

        if ($edad >= 18) {
            echo "eres mayor de edad";
        } else {
            echo "no eres mayor de edad";
        }
    }
    ?>
</body>
</html>