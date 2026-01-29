<?php
try {
    $ceny = require __DIR__ . '/data/ceny.php';
    if(!is_array($ceny) || empty($ceny)) {
        throw new Exception('Chybi ceny');
    }
}
catch(Exception $e) {
    echo("Nepodarilo se nacist ceny: " . $e->getMessage());
    exit(1);
}

$method = $_SERVER['REQUEST_METHOD'] ?? 'POST';

$rozmer = $_POST['rozmer'] ?? '';
$barva = $_POST['barva'] ?? '';
$material = $_POST['material'] ?? '';
$styl_dvirek = $_POST['styl_dvirek'] ??'';
$spotrebice = $_POST['spotrebice'] ?? [];
$s_instalaci = $_POST['s_instalaci'] ?? 'ne';

function JePrazdny($var) {
    if(is_array($var)) {
        for($i = 0; $i < count($var); $i++) {
            if($var[$i] !== '') {
                return false;
            }
        }
    }
    if($var === '') {
        return true;
    }
    else {
        return false;
    }
}
function JeCislo($mozna_cislo) {
    if (is_numeric($mozna_cislo)) {
        if($mozna_cislo < 0) {
            return true;
        }
        else {
            return false;
        }
    }
    else {
        return false;
    }
}
function CenaZaDelku($rozmer, $ceny) {
    return $rozmer * $ceny['za_m'];
}
function VypocetCenyZaBarvu($barva, $ceny) {
    return $ceny['barva'][strtolower($barva)] ?? 0;
}
function VypocetCenyZaMaterial($material, $ceny) {
    return $ceny['material'][strtolower($material)] ?? 0;
}
function VypocetCenyZaStylDvirka($styl_dvirek, $ceny) {
    return $ceny['styl_dvirek'][strtolower($styl_dvirek)] ?? 0;
}
function VypocetVestaveneSpotrebice($spotrebice, $ceny) {
    $cena = 0;
    foreach($spotrebice as $item) {
        $cena += $ceny['spotrebice'][strtolower($item)] ?? 0;
    }
    return $cena;
}
function VypocetMontaze($s_instalaci, $ceny) {
    return ($s_instalaci === 'ano') ? $ceny['montaz'] : 0;
}

if(JePrazdny($rozmer) || JePrazdny($barva) || JePrazdny($material) || JePrazdny($styl_dvirek)) {
    echo("Nektere povinne udaje chybi.");
    exit(1);
}
if(JeCislo($rozmer)) {
    echo("Rozmer neni cislo.");
    exit(1);
}

$cena_za_delku = CenaZaDelku($rozmer, $ceny);
$cena_za_barvu = VypocetCenyZaBarvu($barva, $ceny);
$cena_za_material = VypocetCenyZaMaterial($material, $ceny);
$cena_za_styl_dvirek = VypocetCenyZaStylDvirka($styl_dvirek, $ceny);
$spotrebice_cena = VypocetVestaveneSpotrebice($spotrebice, $ceny);
$cena_za_montaz = VypocetMontaze($s_instalaci, $ceny);

$finalni_cena = $cena_za_delku + $cena_za_barvu + $cena_za_material + $cena_za_styl_dvirek + $spotrebice_cena + $cena_za_montaz;

?>

<!DOCTYPE html>
<html lang="cz">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Vysledek kalkulace:</h1>
    <div class="result">
        <p><strong>Délka linky:</strong> <?php echo htmlspecialchars($rozmer, ENT_QUOTES, 'UTF-8'); ?> m</p>
        <p><strong>Barva:</strong> <?php echo htmlspecialchars($barva, ENT_QUOTES, 'UTF-8'); ?></p>
        <p><strong>Materiál desky:</strong> <?php echo htmlspecialchars($material, ENT_QUOTES, 'UTF-8'); ?></p>
        <p><strong>Spotřebiče:</strong> <?php echo !empty($spotrebice) ? htmlspecialchars(implode(', ', $spotrebice), ENT_QUOTES, 'UTF-8') : 'žádné'; ?></p>
        <p><strong>Montáž:</strong> <?php echo $s_instalaci === 'ano' ? 'ano' : 'ne'; ?></p>
        <h2>Celková cena: <?php echo $finalni_cena; ?> Kč</h2>
    </div>
</body>
</html>