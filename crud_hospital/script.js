function buscarHospital() {
    const input = document.getElementById('buscar').value.toLowerCase();
    const filas = document.querySelectorAll('#hospitales tr.hospital');

    filas.forEach(fila => {
        const nombre = fila.cells[1].textContent.toLowerCase();
        if (nombre.includes(input)) {
            fila.style.display = '';
        } else {
            fila.style.display = 'none';
        }
    });
}