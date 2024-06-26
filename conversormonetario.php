<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor Monetário</title>
    <link rel="stylesheet" href="./styles.css" class="css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Caveat:wght@400..700&family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Domine:wght@400..700&family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap"
        rel="stylesheet">
</head>

<body>
    <div class="listra1"></div>
    <div class="listra2"></div>
    <header>
        <h1><a href="./index.php">Projetos PHP</a></h1>
    </header>
    <main class="maingeral">
        <div>
            <h1>Conversor Monetário</h1>
            <form class="formulariogeral" action="conversormonetario.php" method="POST">
                <div class="content">
                    <input min="0" placeholder="Valor a converter" for="selector1" name="input1" type="number"
                        step="0.01" required />
                    de
                    <select name="selector1" id="selector1">
                        <option name="USD" value="USD">USD</option>
                        <option name="EUR" value="EUR">EUR</option>
                        <option name="BRL" value="BRL">BRL</option>
                        <option name="JPY" value="JPY">JPY</option>
                    </select>
                    para
                    <select name="selector2" id="selector2">
                        <option name="USD" value="USD">USD</option>
                        <option name="EUR" value="EUR">EUR</option>
                        <option name="BRL" value="BRL">BRL</option>
                        <option name="JPY" value="JPY">JPY</option>
                    </select>
                </div>
                <br>
                <input class="button" type="submit" value="Converter" />
                <input class="button" type="reset" value="Limpar" />
            </form>
            <div class="resultado">
                    <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        if ($_POST["selector1"] == $_POST["selector2"]) {
                            if($_POST["selector1"] == "USD") {
                                $resultado = $_POST["input1"];
                                echo "<div class='resposta'><h2>$ $resultado </h2></div>";
                            }
                            if($_POST["selector1"] == "BRL") {
                                $resultado = $_POST["input1"];
                                echo "<div class='resposta'><h2>R$ $resultado </h2></div>";
                            }
                            if($_POST["selector1"] == "EUR") {
                                $resultado = $_POST["input1"];
                                echo "<div class='resposta'><h2>€ $resultado </h2></div>";
                            }
                            if($_POST["selector1"] == "JPY") {
                                $resultado = $_POST["input1"];
                                echo "<div class='resposta'><h2>¥ $resultado </h2></div>";
                            }
                        }
                        ;

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
                                echo "<div class='resposta'><h2>Erro ao fazer a requisição à API: " . curl_error($ch)."</h2></div>";
                            }
                            curl_close($ch);
                            $resultado = $_POST["input1"] * $cotacao;
                            
                            if($_POST["selector2"] == "USD") {
                                echo "<div class='resposta'><h2>$ ".number_format($resultado, 2, ',', '.')." </h2></div>";
                            }
                            if($_POST["selector2"] == "BRL") {
                                echo "<div class='resposta'><h2>R$ ".number_format($resultado, 2, ',', '.')." </h2></div>";
                            }
                            if($_POST["selector2"] == "EUR") {
                                echo "<div class='resposta'><h2>€ ".number_format($resultado, 2, ',', '.')." </h2></div>";
                            }
                            if($_POST["selector2"] == "JPY") {
                                echo "<div class='resposta'><h2>¥ ".number_format($resultado, 2, ',', '.')." </h2></div>";
                            }
                        }
                        ;
                    }
                    ;
                    ?>
                </div>
        </div>
    </main>
    <footer>
        <p>Desenvolvido por Kauã Valim - 2024</p>
    </footer>
</body>

</html>