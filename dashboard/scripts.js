$(document).ready(function() {
    // Configuración de los gráficos con Chart.js
    var activeUsersChart = new Chart(document.getElementById("activeUsersChart"), {
        type: 'bar',
        data: {
            labels: ['Usuarios Activos'],
            datasets: [{
                label: 'Usuarios Activos',
                data: [50], // Valor inicial que luego se actualizará
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    var salesChart = new Chart(document.getElementById("salesChart"), {
        type: 'line',
        data: {
            labels: ['Ventas'],
            datasets: [{
                label: 'Ventas',
                data: [75], // Valor inicial
                backgroundColor: 'rgba(153, 102, 255, 0.2)',
                borderColor: 'rgba(153, 102, 255, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    var profitsChart = new Chart(document.getElementById("profitsChart"), {
        type: 'pie',
        data: {
            labels: ['Ganancias'],
            datasets: [{
                label: 'Ganancias',
                data: [1250], // Valor inicial
                backgroundColor: ['rgba(255, 159, 64, 0.2)', 'rgba(54, 162, 235, 0.2)'],
                borderColor: ['rgba(255, 159, 64, 1)', 'rgba(54, 162, 235, 1)'],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true
        }
    });

    // Función para actualizar el número de usuarios activos y el gráfico con AJAX
    function updateActiveUsers() {
        $.ajax({
            url: "active_users.php",
            success: function(data) {
                // Actualiza el texto y el gráfico
                $("#activeUsers").text(data);
                activeUsersChart.data.datasets[0].data = [data]; // Actualiza el gráfico de usuarios activos
                activeUsersChart.update(); // Refresca el gráfico
            }
        });
    }

    // Actualiza cada 10 segundos
    setInterval(updateActiveUsers, 10000);

    // También puedes agregar funciones similares para ventas y ganancias si tienes esos datos dinámicos
});
