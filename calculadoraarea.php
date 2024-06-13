<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Área</title>
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
    <h1>Calculadora de Área</h1>
    <form class="formulario" action="calculadoraarea.php" method="post">
        <p>Escolha a forma:
            <select name="forma" class="forma" onchange="getSeletor()">
                <option value="Retangulo">Retângulo</option>
                <option value="Triangulo">Triângulo</option>
                <option value="Circulo">Círculo</option>
            </select>
        </p>
        <div class="values" id="valor">
            <p>Largura: <input placeholder="0,00" type="number" name="largura" step="0.01" required></p>
            <p>Altura: <input placeholder="0,00" type="number" name="altura" step="0.01" required></p>
        </div>
        <input type="submit" value="Calcular">
        <input type="reset" value="Limpar">
    </form>
    <div class="resposta">
    <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        if (isset($_POST["largura"]) && isset($_POST["altura"])) {
            if (is_numeric($_POST["largura"]) && is_numeric($_POST["altura"])) {
                $resposta = $_POST["largura"] * $_POST["altura"];
                echo "<h2>$resposta M²</h2>";
            } else {
                echo "<h2>Informe números nos campos de altura e largura</h2>";
            }
        }


        if (isset($_POST["base"]) && isset($_POST["atriangulo"])) {
            if (is_numeric($_POST["base"]) && is_numeric($_POST["atriangulo"])) {
                $resposta = $_POST["atriangulo"] * $_POST["base"] / 2.0;
                echo "<h2>$resposta M²</h2>";
            } else {
                echo "<h2>Informe números nos campos de Base e Altura</h2>";
            }
        }


        if (isset($_POST["raio"])) {
            if (is_numeric($_POST["raio"])) {
                $resposta = pi() * pow($_POST["raio"], 2);
                echo "<h2>" . number_format($resposta, 2, ',', '.') . " M²</h2>";
            } else {
                echo "<h2>Informe um número no campo Raio</h2>";
            }
        }
    }
    ?>
    </div>
    </main>
    <footer>
        <p>Desenvolvido por Kauã Valim - 2024</p>
    </footer>
    <script src="./script.js"></script>
</body>

</html>