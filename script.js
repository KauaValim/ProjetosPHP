const valor = document.getElementById('valor')
const seletor = document.getElementsByTagName('option')

function getSeletor() {
    if (seletor.item(0).selected == true) { valor.innerHTML = '<input class="inputbox" placeholder="Largura: 0,00" type="number" name="largura" step="0.1" required><br><br><input class="inputbox" placeholder="Altura: 0,00" type="number" name="altura" step="0.1" required>' }

    if (seletor.item(1).selected == true) { valor.innerHTML = '<input class="inputbox" placeholder="Base: 0,00" type="number" name="base" step="0.1" required><br><br><input class="inputbox" placeholder="Altura: 0,00" type="number" name="atriangulo" step="0.1" required>' }

    if (seletor.item(2).selected == true) { valor.innerHTML = '<input class="inputbox" placeholder="Raio: 0,00" type="number" name="raio" step="0.1" required><br><br>' }
}
