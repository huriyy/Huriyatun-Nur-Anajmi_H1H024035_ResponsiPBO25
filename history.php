<?php
// history.php — Menampilkan seluruh riwayat latihan

$historyFile = "history.json";

// Jika file ada → ambil data
if (file_exists($historyFile)) {
    $riwayat = json_decode(file_get_contents($historyFile), true);
} else {
    $riwayat = [];
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Riwayat Latihan Pokémon</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

    <h1>Riwayat Latihan</h1>

    <?php if (empty($riwayat)): ?>
        <p>Belum ada riwayat latihan.</p>

    <?php else: ?>

        <?php foreach ($riwayat as $item): ?>
            <div class="card history-item">
                <p><strong>Waktu:</strong> <?= $item['time'] ?></p>
                <p><strong>Jenis Latihan:</strong> <?= $item['training'] ?></p>
                <p><strong>Intensitas:</strong> <?= $item['intensity'] ?></p>

                <p><strong>Level:</strong> <?= $item['before']['level'] ?> → <?= $item['after']['level'] ?></p>
                <p><strong>HP:</strong> <?= $item['before']['hp'] ?> → <?= $item['after']['hp'] ?></p>
            </div>
        <?php endforeach; ?>

    <?php endif; ?>

    <div class="buttons">
        <a href="index.php" class="btn">Kembali ke Beranda</a>
    </div>

</div>

</body>
</html>
