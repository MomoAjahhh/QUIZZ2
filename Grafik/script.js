document.addEventListener('DOMContentLoaded', () => {
    const initialLabels = ["January", "February", "March", "April", "May"];
    const initialDataValues = [10, 20, 15, 25, 30];

    const ctx = document.getElementById('myChart').getContext('2d');
    let myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [...initialLabels],
            datasets: [{
                label: 'Nilai',
                data: [...initialDataValues],
                borderColor: 'blue',
                backgroundColor: 'blue',
                tension: 0,
                fill: false,
                borderWidth: 2,
                pointBackgroundColor: 'white',
                pointBorderColor: 'blue',
                pointRadius: 4,
                pointBorderWidth: 1.5,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    title: { display: false },
                    grid: {
                        display: false,
                        drawBorder: true,
                        borderColor: 'black',
                        borderWidth: 1.5,
                    },
                    ticks: { padding: 8, color: '#333', font: {size: 11} }
                },
                x: {
                    title: { display: false },
                    grid: {
                        display: false,
                        drawBorder: true,
                        borderColor: 'black',
                        borderWidth: 1.5, 
                    },
                    ticks: { padding: 8, color: '#333', font: {size: 11} }
                }
            },
            plugins: {
                legend: {
                    display: true,
                    position: 'top',
                    align: 'center',
                    labels: {
                        usePointStyle: true,
                        pointStyle: 'rect',
                        boxWidth: 10,
                        boxHeight: 10,
                        padding: 15,
                        color: '#333',
                        font: { size: 12 }
                    }
                },
                title: {
                    display: true,
                    text: 'Tampilan Nilai Maksimal Nilai',
                    padding: { top: 10, bottom: 10 },
                    font: { size: 14, weight: 'normal' },
                    color: '#333'
                }
            },
            layout: {
                padding: {
                    top: 5,
                    left: 10,
                    right: 10,
                    bottom: 5
                }
            }
        }
    });

    const labelInput = document.getElementById('labelInput');
    const valueInput = document.getElementById('valueInput');
    const addDataButton = document.getElementById('addDataButton');

    addDataButton.addEventListener('click', () => {
        const newLabel = labelInput.value.trim();
        const newValueText = valueInput.value.trim();

        if (!newLabel || !newValueText) {
            alert('Label dan Value tidak boleh kosong!');
            return;
        }
        const newValue = parseFloat(newValueText);
        if (isNaN(newValue)) {
            alert('Value harus berupa angka!');
            valueInput.value = '';
            return;
        }

        myChart.data.labels.push(newLabel);
        myChart.data.datasets.forEach((dataset) => {
            dataset.data.push(newValue);
        });
        myChart.update();

        labelInput.value = '';
        valueInput.value = '';
        labelInput.focus();
    });
});