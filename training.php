<?php
// training.php — Halaman Latihan Pokémon

// --- CLASS POKEMON ---
class Pokemon {
    public $name;
    public $type;
    public $level;
    public $hp;

    public function __construct($name, $type, $level, $hp) {
        $this->name  = $name;
        $this->type  = $type;
        $this->level = $level;
        $this->hp    = $hp;
    }

    // Jurus spesial berdasarkan tipe Pokémon
    public function specialMove() {
        $moves = [
            "Water" => "Aqua Shield — meningkatkan pertahanan & menyembuhkan sedikit HP",
            "Fire"  => "Flame Burst — ledakan api meningkatkan Attack",
            "Electric" => "Thunder Shock — kecepatan meningkat drastis",
            "Grass" => "Leaf Cyclone — meningkatkan kontrol energi"
        ];

        return $moves[$this->type] ?? "Basic Strike";
    }

    // Metode latihan
    public function train($type, $intensity) {
        $before = [
            "level" => $this->level,
            "hp"    => $this->hp
        ];

        // Bonus berdasarkan tipe latihan
        $bonus = 1;
        if ($type === "Attack"  && $this->type === "Fire")     $bonus = 2;
        if ($type === "Defense" && $this->type === "Grass")    $bonus = 2;
        if ($type === "Speed"   && $this->type === "Electric") $bonus = 2;
        if ($type === "Speed"   && $this->type === "Water")    $bonus = 1.5; // Poliwrath buff

        // Rumus peningkatan
        $this->level += floor(($intensity / 3) * $bonus);
        $this->hp    += floor($intensity * 2);

        return $before;
    }
}

// --- INISIALISASI POKÉMON (Poliwrath) ---
$pokemon = new Pokemon("Poliwrath", "Water", 5, 40);

$result = null;

// Jika form disubmit
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $jenis = $_POST['jenis'];
    $int   = (int) $_POST['intensitas'];

    // Latihan
    $before = $pokemon->train($jenis, $int);
    $after = [
        "level" => $pokemon->level,
        "hp"    => $pokemon->hp
    ];

    // Simpan riwayat ke file JSON
    $riwayat = [
        "time"   => date("Y-m-d H:i:s"),
        "training" => $jenis,
        "intensity" => $int,
        "before" => $before,
        "after"  => $after
    ];

    $historyFile = "history.json";

    if (file_exists($historyFile)) {
        $data = json_decode(file_get_contents($historyFile), true);
    } else {
        $data = [];
    }

    $data[] = $riwayat;
    file_put_contents($historyFile, json_encode($data, JSON_PRETTY_PRINT));

    // Output untuk ditampilkan
    $result = $riwayat;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Latihan Pokémon</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h1>Latihan Pokémon</h1>

    <form method="POST">
        <label>Jenis Latihan:</label>
        <select name="jenis">
            <option value="Attack">Attack</option>
            <option value="Defense">Defense</option>
            <option value="Speed">Speed</option>
        </select>

        <label>Intensitas:</label>
        <input type="number" name="intensitas" min="1" max="20" value="5">

        <button type="submit" class="btn">Mulai Latihan</button>
    </form>

    <?php if ($result): ?>
        <div class="card result">
            <h3>Hasil Latihan</h3>

            <p><strong>Jenis Latihan:</strong> <?= $result['training'] ?></p>
            <p><strong>Intensitas:</strong> <?= $result['intensity'] ?></p>

            <p><strong>Level:</strong> <?= $result['before']['level'] ?> → <?= $result['after']['level'] ?></p>
            <p><strong>HP:</strong> <?= $result['before']['hp'] ?> → <?= $result['after']['hp'] ?></p>

            <p><strong>Jurus Spesial:</strong> <?= $pokemon->specialMove() ?></p>
        </div>
    <?php endif; ?>

    <div class="buttons">
        <a href="index.php" class="btn">Kembali ke Beranda</a>
        <a href="history.php" class="btn alt">Riwayat Latihan</a>
    </div>
</div>

</body>
</html>
