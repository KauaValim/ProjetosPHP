<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor de temperatura</title>
    <link rel="stylesheet" href="./styles.css" class="css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400..700&family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Domine:wght@400..700&family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
</head>

<body>
    <div class="listra1"></div>
    <div class="listra2"></div>
    <header>
        <h1><a href="./index.php">Projetos PHP</a></h1>
    </header>
    <main>
    <div class="container">
        <h1>Conversor de Temperatura</h1>
        <br>
        <form class="formulario" action="tempconverter.php" method="POST">
            <p>Temperatura
                <input type="number" step="0.01" name="temp" required>
            </p>
            <p>Converter <br><br> De:
                <select name="de">
                    <option value="Celsius">Celsius</option>
                    <option value="Fahrenheit">Fahrenheit</option>
                    <option value="Kelvin">Kelvin</option>
                </select>
            </p>

            <p>Para:
                <select name="para">
                    <option value="Fahrenheit">Fahrenheit</option>
                    <option value="Kelvin">Kelvin</option>
                    <option value="Celsius">Celsius</option>
                </select>
            </p>
            <input type="submit" value="Converter">
            <input type="reset" value="Limpar">
        </form>
    </div>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["temp"]) && is_numeric($_POST["temp"]) && $_POST["de"] == "Fahrenheit" && $_POST["para"] == "Celsius") {
            $resposta = ($_POST["temp"] - 32) * 5.0 / 9.0;
            echo "<div>" . number_format($resposta, 4, ',', '.') . " C°</div>";
        }
        if (isset($_POST["temp"]) && is_numeric($_POST["temp"]) && $_POST["de"] == "Fahrenheit" && $_POST["para"] == "Kelvin") {
            $resposta = ($_POST["temp"] - 32) * 5 / 9 + 273.15;
            echo "<div>" . number_format($resposta, 3, ',', '.') . " K</div>";
        }

        if (isset($_POST["temp"]) && is_numeric($_POST["temp"]) && $_POST["de"] == "Kelvin" && $_POST["para"] == "Celsius") {
            $resposta = $_POST["temp"] - 273.15;
            echo "<div>" . number_format($resposta, 2, ',', '.') . " C°</div>";
        }
        if (isset($_POST["temp"]) && is_numeric($_POST["temp"]) && $_POST["de"] == "Kelvin" && $_POST["para"] == "Fahrenheit") {
            $resposta = ($_POST['temp'] - 273.15) * 9.0 / 5.0 + 32;
            echo "<div>" . number_format($resposta, 2, ',', '.') . " F°</div>";
        }

        if (isset($_POST["temp"]) && is_numeric($_POST["temp"]) && $_POST["de"] == "Celsius" && $_POST["para"] == "Fahrenheit") {
            $resposta = ($_POST["temp"] * 9.0 / 5.0) + 32;
            echo "<div>" . number_format($resposta, 1, ',', '.') . " F°</div>";
        }
        if (isset($_POST["temp"]) && is_numeric($_POST["temp"]) && $_POST["de"] == "Celsius" && $_POST["para"] == "Kelvin") {
            $resposta = $_POST['temp'] + 273.15;
            echo "<div>" . number_format($resposta, 2, ',', '.') . " K</div>";
        }

        if (isset($_POST["temp"]) && is_numeric($_POST["temp"]) && $_POST["de"] == $_POST["para"]) {
            if ($_POST["de"] == "Fahrenheit") {
                $resposta = $_POST["temp"];
                echo "<div>" . number_format($resposta, 2, ',', '.') . " F°</div>";
            }
            if ($_POST["de"] == "Kelvin") {
                $resposta = $_POST["temp"];
                echo "<div>" . number_format($resposta, 2, ',', '.') . " K</div>";
            }
            if ($_POST["de"] == "Celsius") {
                $resposta = $_POST["temp"];
                echo "<div>" . number_format($resposta, 2, ',', '.') . " C°</div>";
            }
        }
    }
    ?>
    </main>
    <footer>
        <p>Desenvolvido por Kauã Valim - 2024</p>
    </footer>
</body>

</html>