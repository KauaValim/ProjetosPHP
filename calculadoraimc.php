<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    <main class="maingeral">
    <h1 >Calculadora IMC</h1>
    <form class="formulariogeral" action="calculadoraimc.php" method="POST">
        <input class="inputbox" placeholder="Digite seu nome" type="text" id="nome" name="nome" required>
        <br>
        <br>
        <input class="inputbox" placeholder="Digite seu peso (Kg)" type="number" id="peso" name="peso" step="0.1" required>
        <br>
        <br>
        <input class="inputbox" placeholder="Digite sua altura (m)" type="number" id="altura" name="altura" step="0.01" required>
        <br>
        <br>
        <?php echo "<input class='inputbox' placeholder='Digite seu ano de nascimento' type='number' min='1900' max='" . date("Y") . "' id='anoNascimento' name='anoNascimento' required>" ?>
        <br>
        <input class="button" type="submit" value="Calcular IMC">
        <input class="button" type="reset" value="Limpar">
    </form>
    <div class="resposta">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["nome"]) && isset($_POST["peso"]) && isset($_POST["altura"]) && isset($_POST["anoNascimento"])) {
                $nome = $_POST["nome"];
                $peso = $_POST["peso"];
                $altura = $_POST["altura"];
                $anoNascimento = $_POST["anoNascimento"];
                $erro = empty($nome) || empty($peso) || empty($altura) || empty($anoNascimento) ? "<div class='resposta'><h2>Todos os campos são obrigatórios</h2></div>" : ((!is_numeric($altura) || !is_numeric($anoNascimento) || ($anoNascimento < 1970 && $anoNascimento > date("Y")) || $peso <= 0 || $altura <= 0) ? "<div class='resposta'><h2>Por favor, insira valores válidos para nome, peso, altura e ano de nascimento</h2></div>" : "");
                if ($erro) {
                    echo $erro;
                } else {
                    $imc = $peso / ($altura * $altura);
                    $imc = number_format($imc, 2);
                    $classificacao = ($imc < 18.5) ? "Abaixo do peso" : (($imc < 24.9) ? "Peso normal" : (($imc < 29.9) ? "Sobre peso" : "Obesidade"));
                    $idade = date("Y") - $anoNascimento;
                    echo "<div class='resposta'>";
                    echo "<h2>$nome, ";
                    echo "você tem: $idade anos, e seu IMC é: $imc</h2>";
                    echo "<h2>Classificação: $classificacao</h2>";
                    echo "</div>";
                }
            } else {
                echo "<div class='resposta'>";
                echo "<h2>Formulário não enviado corretamente</h2>";
                echo "</div>";
            }
        }
        ?>
    </div>
    </main>
    <footer>
        <p>Desenvolvido por Kauã Valim - 2024</p>
    </footer>
</body>

</html>