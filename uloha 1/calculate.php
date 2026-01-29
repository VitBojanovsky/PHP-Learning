<?php
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
function VypocetCenyZaBarvu($barva) {
    switch( $barva ) {
        case 'Bila':
            return 0;
            break;
        case 'Seda':
            return 1500;
            break;
        case 'Cerna':
            return 3000;
            break;
        case "Drevo":
            return 2000;
            break;
        default:
            return 0;
            break;
    }
}

?>