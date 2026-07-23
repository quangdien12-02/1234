document.addEventListener('DOMContentLoaded', function() {
    const labels = ['Điểm A', 'Điểm B', 'Điểm C'];
    const data = [0, 0, 0];
    const rows = document.querySelectorAll('.table tbody tr');

    rows.forEach(row => {
        const cells = row.querySelectorAll('td');
        data[0] += parseFloat(cells[3].innerText); // Điểm A
        data[1] += parseFloat(cells[4].innerText); // Điểm B
        data[2] += parseFloat(cells[5].innerText); // Điểm C
    });

    const ctx = document.getElementById('myPieChart').getContext('2d');
    const myPieChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: labels,
            datasets: [{
                data: data,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                tooltip: {
                    callbacks: {
                        label: function(tooltipItem) {
                            return tooltipItem.label + ': ' + tooltipItem.raw;
                        }
                    }
                }
            }
        }
    });
});