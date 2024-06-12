<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rifa PHP</title>
    <link rel="stylesheet" href="./styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400..700&family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
</head>

<body class="css-selector">
    <?php
    $premio = "Rádio JBL";
    $valor = "R$ 5,00";
    $cont = 1;
    $imagem = "https://infostore.vteximg.com.br/arquivos/ids/252517-1000-1000/caixa_de_som_amplificada_partybox_ultimate_1100w_-_jbl_01.jpg?v=638428272365070000";

    echo "<h1>Ação entre amigos - CSL</h1>";
    echo "<div class='headerTitle'>";
    echo "<h2 class='subtitle'>Quantidade de rifas à gerar: </h2>";
    echo "<div class='head'>";

    echo "<form action='rifa.php' method='POST'>";
    echo "<input type='number' placeholder='Digite a quantidade' min='0' max='9999' maxlength=4 name='valor' required/>";
    echo "<input type='number' placeholder='Nº inicial' min='1' max='9999' maxlength=4 name='inicio' required/>";
    echo "<button type='submit'>Gerar Rifas</button>";
    echo "</form>";
    echo "</div>";
    echo "</div>";

    if ($_SERVER['REQUEST_METHOD']=="POST") {
    if (isset($_POST['valor']) && !empty($_POST['valor']) && isset($_POST['inicio']) && !empty($_POST['inicio'])) {
        $numero = $_POST['inicio'];
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
        };
    };
};



    ?>
</body>

</html>