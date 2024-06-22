$(document).ready(function() {
    $.getJSON('/json/data.matriculas.php', function(data) {
        var miGráfico = new Chart(document.getElementById('cantidadMatriculasAnio').getContext('2d'), {
            type: 'bar',
            data: {
                labels: data.labels,
                datasets: [{
                    label: 'Matrículas por Año',
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
                        text: 'Matrículas'
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
                            text: 'Año de la Matrícula'
                        }
                    },
                    y: {
                        display: true,
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Cantidad de Matrículas'
                        }
                    }
                }
            }
        });
    }).fail(function(jqXHR, textStatus, errorThrown) {
        console.error('Error al cargar los datos:', textStatus, errorThrown);
    });
});