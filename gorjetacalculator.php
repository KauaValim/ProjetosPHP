<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Gorjeta</title>
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
    <div class="container">
        <h1>Calculadora de Gorjeta</h1>
        <br>
        <form action="gorjetacalculator.php" method="post">
            <p>Valor da Conta: (R$)
                <input type="number" name="valor" required>
            </p>
            <br>
            <p>Porcentagem de gorjeta: (%)
                <input type="number" name="percent" required>
            </p>
            <br>
            <div class="buttons">
                <input class="btn" type="submit" value="Calcular">
                <input class="btn" type="reset" value="Limpar">
            </div>
        </form>
    </div>

    <div class="resposta">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty("valor") || empty("percent")) {
                echo "Preencha todos os campos";
            } else {
                $resposta = $_POST["valor"] * ($_POST["percent"] / 100);
                echo "<h2 class='result'>Valor da gorjeta: R$ <b>" . number_format($resposta, 2, ',', '.') . "<b><h2>";
            }
        }
        ?>
    </div>
    <footer>
        <p>Desenvolvido por Kauã Valim - 2024</p>
    </footer>
</body>

</html>