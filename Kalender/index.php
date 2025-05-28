<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);


$bulan = isset($_GET['bulan']) ? (int)$_GET['bulan'] : 2; 
$tahun = isset($_GET['tahun']) ? (int)$_GET['tahun'] : 2025; 


if ($bulan < 1) {
    $bulan = 12; 
    $tahun--; 
} 
if ($bulan > 12) {
    $bulan = 1; 
    $tahun++; 
}


$nama_bulan = array(
    "January", "February", "March", "April", "May", "June", 
    "July", "August", "September", "October", "November", "December"
);


$jumlah_hari = date('t', strtotime($tahun."-".$bulan."-01"));


$hari_pertama = date('w', strtotime($tahun."-".$bulan."-01")); 
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalender <?php echo $nama_bulan[$bulan-1]." ".$tahun; ?></title>
    <link rel="stylesheet" href="kalender.css">
</head>
<body>
    <div class="container">
        <div class="calendar-container">
            <div class="calendar-header">
                <a href="?bulan=<?php echo ($bulan-1); ?>&tahun=<?php echo $tahun; ?>" class="nav-link">
                    &lt;&lt; Bulan Sebelumnya
                </a>
                <h2 class="month-year"><?php echo $nama_bulan[$bulan-1]." ".$tahun; ?></h2>
                <a href="?bulan=<?php echo ($bulan+1); ?>&tahun=<?php echo $tahun; ?>" class="nav-link">
                    &gt;&gt; Bulan Berikutnya
                </a>
            </div>
            
            <table class="calendar">
                <thead>
                    <tr>
                        <th>Minggu</th>
                        <th>Senin</th>
                        <th>Selasa</th>
                        <th>Rabu</th>
                        <th>Kamis</th>
                        <th>Jumat</th>
                        <th>Sabtu</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                        
                        for ($i = 0; $i < $hari_pertama; $i++) {
                            echo '<td class="empty"></td>';
                        }
                        
                        
                        for ($hari = 1; $hari <= $jumlah_hari; $hari++) {
                            
                            if ($hari == 15) {
                                echo '<td class="highlight">'.$hari.'</td>';
                            } 
                            
                            else {
                                echo '<td>'.$hari.'</td>';
                            }
                            
                            
                            if (($hari + $hari_pertama) % 7 == 0) {
                                echo '</tr><tr>';
                            }
                        }
                        
                        
                        $sisa_sel = 7 - (($jumlah_hari + $hari_pertama) % 7);
                        if ($sisa_sel != 7) { 
                            for ($i = 0; $i < $sisa_sel; $i++) {
                                echo '<td class="empty"></td>';
                            }
                        }
                        ?>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>