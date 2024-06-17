<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rifa PHP</title>
    <link rel="stylesheet" href="./styles.css" class="css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Caveat:wght@400..700&family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Domine:wght@400..700&family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap"
        rel="stylesheet">
</head>

<body class="css-selector">
    <div class="listra1"></div>
    <div class="listra2"></div>
    <header>
        <h1><a href="./index.php">Projetos PHP</a></h1>
    </header>
    <main class="maincontent">
        <?php


        echo "<h1 class='title'>Ação entre amigos - CSL</h1>";
        echo "<div class='headerTitle'>";
        echo "<h2 class='subtitle'>Quantidade de rifas à gerar: </h2>";
        echo "<div class='head'>";

        echo "<form action='rifa.php' method='POST'>";
        echo "<div class='formulariorifa'>";
        echo "<input type='number' placeholder='Digite a quantidade' min='0' max='9999' maxlength=4 name='valor' required/>";
        echo "<input type='number' placeholder='Nº inicial' min='1' max='9999' maxlength=4 name='inicio' required/>";

        echo "<input type='text' placeholder='Premio' maxlength=30 name='premio' required/>";
        echo "<input type='number' placeholder='Valor' min='1' step='0.01' name='preco' required/>";
        echo "</div>";
        echo "<div class='formulariorifa2'>";
        echo "<input type='text' placeholder='URL Imagem' name='URL' required />";
        echo "<button type='submit'>Gerar Rifas</button>";
        echo "</div>";
        echo "</div>";
        echo "<br>";
        echo "</form>";
        echo "</div>";
        echo "</div>";

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (isset($_POST['valor']) && !empty($_POST['valor']) && isset($_POST['inicio']) && !empty($_POST['inicio']) && isset($_POST['premio']) && !empty($_POST['premio']) && isset($_POST['preco']) && !empty($_POST['preco']) && isset($_POST['URL']) && !empty($_POST['URL'])) {
                $numero = $_POST['inicio'];
                $premio = $_POST['premio'];
                $valor = $_POST['preco'];
                $cont = 1;
                $imagem = $_POST['URL'];
                while ($cont <= $_POST['valor']) {
                    echo "<table>
        <tr>
            <td class='recib'>
                <p class='number'><b>Nº ";
                    echo str_pad($numero, 4, '0', STR_PAD_LEFT);
                    echo "</b></p>
                <p>Nome: ______________________________</p>
                <p>Telefone: ____________________________</p>
                <p>Email: ______________________________</p>
            </td>
            
            <td class='canh'>
                <h2 >Ação entre amigos - CSL</h2>
                <p>$premio</p>
                <p>Valor: $valor</p>
                <p><b>Nº ";
                    echo str_pad($numero, 4, '0', STR_PAD_LEFT);
                    echo "</b></p>
            </td>
            <td>
                <img src='$imagem' alt='foto' class='foto' />
            </td>
        </tr></table>";
                    $numero++;
                    $cont++;
                }
                ;
            }
            ;
        }
        ;



        ?>
        <br>
    </main>
    <footer>
        <p>Desenvolvido por Kauã Valim - 2024</p>
    </footer>
</body>

</html>