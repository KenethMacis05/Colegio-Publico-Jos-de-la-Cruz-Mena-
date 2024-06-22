$(document).ready(function() {
    $.getJSON('/json/data.calificaciones.php', function(data) {
        var miGráfico = new Chart(document.getElementById('cantidadCalificacionesAnio').getContext('2d'), {
            type: 'bar',
            data: {
                labels: data.labels,
                datasets: [{
                    label: 'Calificaciones por Año',
                    data: data.datasets[0].data,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.6)',
                        'rgba(54, 162, 235, 0.6)',
                        'rgba(255, 206, 86, 0.6)',
                        'rgba(75, 192, 192, 0.6)',
                    ],
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Calificaciones'
                    },
                    tooltip: {
                        mode: 'index',
                        intersect: false,
                    }
                },
                scales: {
                    x: {
                        display: true,
                        title: {
                            display: true,
                            text: 'Año de la Calificación'
                        }
                    },
                    y: {
                        display: true,
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Cantidad de Calificaciones'
                        }
                    }
                }
            }
        });
    }).fail(function(jqXHR, textStatus, errorThrown) {
        console.error('Error al cargar los datos:', textStatus, errorThrown);
    });
});