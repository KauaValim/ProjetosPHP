<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor Monetário</title>
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
    <div>
        <h1>Conversor Monetário</h1>
        <form action="conversormonetario.php" method="POST">
            <div class="content">
                <div class="converter">
                    <label for="selector1">Moeda à converter: </label>
                    <input min="0" for="selector1" name="input1" type="number" step="0.01" required />
                </div>
                <div class="seletor">
                    <select name="selector1" id="selector1">
                        <option name="USD" value="USD">USD</option>
                        <option name="EUR" value="EUR">EUR</option>
                        <option name="BRL" value="BRL">BRL</option>
                        <option name="JPY" value="JPY">JPY</option>
                    </select>
                    X
                    <select name="selector2" id="selector2">
                        <option name="USD" value="USD">USD</option>
                        <option name="EUR" value="EUR">EUR</option>
                        <option name="BRL" value="BRL">BRL</option>
                        <option name="JPY" value="JPY">JPY</option>
                    </select>
                </div>
                <div class="resultado">
                    <label for="selector2">Moeda convertida: </label>
                    <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        if ($_POST["selector1"] == $_POST["selector2"]) {
                            $resultado = $_POST["input1"];
                            echo "<input for='selector2' name='input2' value=$resultado readonly />";
                        };

                        if ($_POST["selector1"] != $_POST["selector2"]) {
                            $url = "https://economia.awesomeapi.com.br/json/last/" . $_POST["selector1"] . "-" . $_POST["selector2"];
                            $local = $_POST["selector1"] . $_POST["selector2"];
                            $method = 'GET';
                            $ch = curl_init();
                            curl_setopt($ch, CURLOPT_URL, $url);
                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
                            $response = curl_exec($ch);
                            if (curl_getinfo($ch, CURLINFO_HTTP_CODE) == 200) {
                                $data = json_decode($response);
                                $cotacao = $data->$local->bid;
                            } else {
                                echo "Erro ao fazer a requisição à API: " . curl_error($ch);
                            }
                            curl_close($ch);
                            $resultado = $_POST["input1"] * $cotacao;
                            echo "<input for='selector2' name='input2' value='" . number_format($resultado, 2, ',', '.') . "' readonly />";
                        };
                    } else {
                        echo "<input for='selector2' name='input2' type='number' readonly />";
                    };
                    ?>
                </div>
            </div>
            <br>
            <br>
            <input class="btn" type="submit" value="Converter" />
            <input class="btn" type="reset" value="Limpar" />
        </form>
    </div>
    <footer>
        <p>Desenvolvido por Kauã Valim - 2024</p>
    </footer>
</body>

</html>