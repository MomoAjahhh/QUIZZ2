<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grafik</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>

    <div class="grey-wrapper">
        <div class="controls-area">
            <input type="text" id="labelInput" placeholder="Label">
            <input type="number" id="valueInput" placeholder="Value">
            <button id="addDataButton">Add Data</button>
        </div>

        <div class="chart-white-box">
            <canvas id="myChart"></canvas>
        </div>
    </div>

    <script src="script.js"></script>
</body>

</html>