document.addEventListener('DOMContentLoaded', function () {
    const modalCargarClientes = document.getElementById('modal-cargar-clientes');
    const modalVerDeudas = document.getElementById('modal-ver-deudas');
    const btnCargarClientes = document.getElementById('cargar-clientes');
    const btnVerDeudas = document.getElementById('ver-deudas');
    const spanCloseCargarClientes = document.getElementById('close-cargar-clientes');
    const spanCloseVerDeudas = document.getElementById('close-ver-deudas');
    const formCargarClientes = document.getElementById('form-cargar-clientes');
    const deudasTableBody = document.getElementById('deudas-table-body');

    btnCargarClientes.onclick = function () {
        modalCargarClientes.style.display = 'block';
    }

    btnVerDeudas.onclick = function () {
        modalVerDeudas.style.display = 'block';
        cargarDeudas();
    }

    spanCloseCargarClientes.onclick = function () {
        modalCargarClientes.style.display = 'none';
    }

    spanCloseVerDeudas.onclick = function () {
        modalVerDeudas.style.display = 'none';
    }

    window.onclick = function (event) {
        if (event.target == modalCargarClientes) {
            modalCargarClientes.style.display = 'none';
        }
        if (event.target == modalVerDeudas) {
            modalVerDeudas.style.display = 'none';
        }
    }

    formCargarClientes.onsubmit = function (e) {
        e.preventDefault();
        // Aquí va el código para enviar los datos del formulario al backend
    }

    function cargarDeudas() {
        // Simulando la carga de datos
        deudasTableBody.innerHTML = `
            <tr>
                <td>1</td>
                <td>Juan Pérez</td>
                <td>juan.perez@example.com</td>
                <td>300000</td>
                <td><button onclick="enviarRecordatorio('juan.perez@example.com')">Enviar Recordatorio</button></td>
            </tr>
            <!-- Añadir más filas según los datos reales -->
        `;
    }
});

function enviarRecordatorio(email) {
    alert('Recordatorio enviado a ' + email);
    // Aquí va el código para enviar el correo de recordatorio
}
