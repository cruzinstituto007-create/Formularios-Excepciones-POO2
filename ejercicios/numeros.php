<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Numeros</title>
    <link rel="stylesheet" href="/estilo.css">
</head>
<body>
    <?php require "../menu.php"; ?>

    <h1>Numeros ascendentes y descendentes</h1>

    <form method="post" action="">
        <label>Introduce un número:</label>
        <input type="number" name="num" min="1" required>
        <button type="submit">Mostrar</button>
    </form>

    <br>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $num = $_POST["num"];

        echo "del 1 al $num: <br>";
        for ($i = 1; $i <= $num; $i++) {
            echo $i . " ";
        }

        echo "<br><br>Numeros invertidos (del $num al 1): <br>";
        for ($i = $num; $i >= 1; $i--) {
            echo $i . " ";
        }
    }
    ?>
</body>
</html>