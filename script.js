const valor = document.getElementById('valor')
const seletor = document.getElementsByTagName('option')

function getSeletor() {
    if (seletor.item(0).selected == true) { valor.innerHTML = '<p>Largura: <input placeholder="0,00" type="number" name="largura" step="0.1" required></p><p>Altura: <input placeholder="0,00" type="number" name="altura" step="0.1" required></p>' }

    if (seletor.item(1).selected == true) { valor.innerHTML = '<p>Base: <input placeholder="0,00" type="number" name="base" step="0.1" required></p><p>Altura: <input placeholder="0,00" type="number" name="atriangulo" step="0.1" required></p>' }

    if (seletor.item(2).selected == true) { valor.innerHTML = '<p>Raio: <input placeholder="0,00" type="number" name="raio" step="0.1" required></p>' }
}
