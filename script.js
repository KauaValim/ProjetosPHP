const valor = document.getElementById('valor')
const seletor = document.getElementById('forma')
console.log(valor)
console.log(seletor)

function getSeletor() {
    if (document.getElementById('forma').value == 'Retângulo') { return( valor.innerHTML('<p>Largura: <input type="number" name="largura" required></p><p>Altura: <input type="number" name="altura" required></p>')) }

    if (document.getElementById('forma').value == 'Triângulo') { valor.innerHTML('<p>Base: <input type="number" name="base" required></p><p>Altura Triangulo: <input type="number" name="atriangulo" required></p>') }

    if (document.getElementById('forma').value == 'Círculo') { valor.innerHTML('<p>Raio: <input type="number" name="raio" required></p>') }
}



