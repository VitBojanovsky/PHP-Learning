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
$s_instalaci = $_POST['s_instalaci'] ?? 'ne';

function JePrazdny($var) {
    if($var === '') {
        return true;
    }
    else {
        return false;
    }
}
function JeCislo($mozna_cislo) {
    if (is_numeric($mozna_cislo)) {
        return true;
    }
    else {
        return false;
    }
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


?>