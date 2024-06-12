<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./styles.css" class="css">
</head>
<body>
    <h1>Calculadora IMC</h1>
    <form action="calculadoraimc.php" method="POST">
        <label for="nome">Nome: </label>
        <input type="text" id="nome" name="nome" required>
        <br>
        <br>
        <label for="peso">Peso (Kg): </label>
        <input type="number" id="peso" name="peso" step="0.1" required>
        <br>
        <br>
        <label for="altura">Altura (m): </label>
        <input type="number" id="altura" name="altura" step="0.01" required>
        <br>
        <br>
        <label for="anoNascimento">Ano Nascimento: </label>
        <?php echo"<input type='number' min='1900' max='". date("Y") ."' id='anoNascimento' name='anoNascimento' required>" ?>
        <br>
        <br>
        <input type="submit" value="Calcula IMC">
        <input type="reset" value="Limpar">
    </form>
    <div class="resposta">
        <?php
            if($_SERVER["REQUEST_METHOD"]=="POST") {
                if(isset($_POST["nome"]) && isset($_POST["peso"]) && isset($_POST["altura"]) && isset($_POST["anoNascimento"])) {
                    $nome = $_POST["nome"];
                    $peso = $_POST["peso"];
                    $altura = $_POST["altura"];
                    $anoNascimento = $_POST["anoNascimento"];
                    $erro = empty($nome) || empty($peso) || empty($altura) || empty($anoNascimento) ? "Todos os campos são obrigatórios": (( !is_numeric($altura) || !is_numeric($anoNascimento) || ($anoNascimento < 1970 && $anoNascimento > date("Y")) || $peso <= 0 || $altura <= 0) ? "Por favor, insira valores válidos para nome, peso, altura e ano de nascimento": "");
                    if ($erro) {
                        echo $erro;
                    } else {
                        $imc = $peso / ($altura * $altura);
                        $imc = number_format($imc,2);
                        $classificacao = ($imc < 18.5) ? "Abaixo do peso" : (($imc < 24.9) ? "Peso normal" : (($imc < 29.9) ? "Sobre peso" : "Obesidade"));
                        $idade = date("Y") - $anoNascimento;
                        echo "<br>$nome, ";
                        echo "você tem: $idade anos, e seu IMC é: $imc<br><br>";
                        echo "Classificação: $classificacao";
                    }
                } else {
                    echo "Formulário não enviado corretamente";
                }
            }
        ?>
    </div>
</body>
</html>