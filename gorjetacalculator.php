<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Gorjeta</title>
    <link rel="stylesheet" href="./styles.css" class="css">
</head>
<body>
    <div class="container">
        <h1>Calculadora de Gorjeta</h1>
        <br>
        <form action="gorjetacalculator.php" method="post">
        <p>Valor da Conta: (R$)
        <input type="number" name="valor" required></p>
        <br>
        <p>Porcentagem de gorjeta: (%)
        <input type="number" name="percent" required></p>
        <br>
        <div class="buttons">
        <input class="btn" type="submit" value="Calcular">
        <input class="btn" type="reset" value="Limpar">
        </div>
        </form>
    </div>

    <div class="resposta">
        <?php
            if($_SERVER["REQUEST_METHOD"]=="POST"){
                if(empty("valor") || empty("percent")) {
                    echo "Preencha todos os campos";
                } else {
                    $resposta = $_POST["valor"]*($_POST["percent"]/100);
                    echo "<h2 class='result'>Valor da gorjeta: R$ <b>".number_format($resposta, 2, ',', '.')."<b><h2>";
                }
            }
        ?>
    </div>
</body>
</html>