<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Periksa Kelipatan Angka</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="canvas-container">
        <div class="container">
            <div class="form-section">
                <form method="post">
                    <label for="kelipatan">Masukkan Kelipatan:</label>
                    <input type="number" id="kelipatan" name="kelipatan" value="<?= $_POST['kelipatan'] ?? '' ?>" min="1" max="40" required>
                    <input type="submit" value="Kirim">
                </form>
            </div>

            <div class="result-section">
                <?php
                error_reporting(E_ALL);
                ini_set('display_errors', 1);
                
                $kelipatan = $_POST['kelipatan'] ?? 0;
                $valid = true;
                $pesan_error = "";

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    if (!is_numeric($kelipatan) || $kelipatan < 1) {
                        $valid = false;
                        $pesan_error = "Angka hanya bisa lebih dari atau sama dengan 1.";
                    }
                }

                if (!$valid): ?>
                    <div class="error-message"><?= $pesan_error ?></div>
                <?php endif; ?>

                <?php if ($valid): ?>
                    <div class="result-title">
                        <?= $kelipatan > 0 ? "Kelipatan dari $kelipatan" : "Tampilkan semua angka" ?>
                    </div>

                    <div class="table-container">
                        <table>
                            <thead>
                                <tr>
                                    <th>Angka</th>
                                    <th>Kelipatan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php for ($i = 1; $i <= 40; $i++): ?>
                                    <tr>
                                        <td class="angka-col"><?= $i ?></td>
                                        <?php if ($kelipatan > 0 && $i % $kelipatan == 0): ?>
                                            <td class="kelipatan-col highlight">
                                                <?= $i ?> <span class="kelipatan-text">(kelipatan dari <?= $kelipatan ?>)</span>
                                            </td>
                                        <?php else: ?>
                                            <td class="kelipatan-col"><?= $i ?></td>
                                        <?php endif; ?>
                                    </tr>
                                <?php endfor; ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>