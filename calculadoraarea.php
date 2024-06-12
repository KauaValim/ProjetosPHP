<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Área</title>
</head>
<body>
    <h1>Calculadora de Área</h1>
    <form action="calculadoraarea.php" method="post">
        <p>Escolha a forma: 
            <select name="forma" id="forma" onchange="getSeletor()">
                <option value="Retangulo">Retângulo</option>
                <option value="Triangulo">Triângulo</option>
                <option value="Circulo">Círculo</option>
            </select>
        </p>
        <div class="values" id="valor">
        </div>
        <!-- <p>Largura: <input type="number" name="largura" required></p>
        <p>Altura: <input type="number" name="altura" required></p>
        <p>Base: <input type="number" name="base" required></p>
        <p>Altura Triangulo: <input type="number" name="atriangulo" required></p>
        <p>Raio: <input type="number" name="raio" required></p> -->
        <input type="submit" value="Calcular">
    </form>
    <script src="./script.js"></script>
</body>
</html>