<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// index.php — Halaman Beranda PokeCare sederhana (PHP murni)
$pokemon = [
    'name'  => 'Poliwrath',
    'type'  => 'Water',
    'level' => 5,
    'hp'    => 40,
    'special' => 'Aqua Shield — pertahanan & HP recovery'
];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PokéCare — Beranda</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">

    <h1>PokéCare</h1>
    <h2>Beranda</h2>

    <div class="card">
        <h3>Informasi Pokémon</h3>
    
        
        <p><strong>Nama:</strong> <?php echo $pokemon['name']; ?></p>
        <p><strong>Tipe:</strong> <?php echo $pokemon['type']; ?></p>
        <p><strong>Level Awal:</strong> <?php echo $pokemon['level']; ?></p>
        <p><strong>HP Awal:</strong> <?php echo $pokemon['hp']; ?></p>
        <p><strong>Jurus Spesial:</strong> <?php echo $pokemon['special']; ?></p>

        <div class="buttons">
            <a href="training.php" class="btn">Mulai Latihan</a>
            <a href="history.php" class="btn alt">Riwayat Latihan</a>
        </div>
    </div>

</div>
</body>
</html>
