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
function VypocetCenyZaMaterial($material) {
    switch( $material ) {
        case 'Drevo':
            return 4000;
            break;
        case 'Laminat':
            return 2000;
            break;
        case 'Kamen':
            return 6000;
            break;
        default:
            return 0;
            break;
    }
}
function VypocetCenyZaStylDvirka($styl_dvirek) {
    switch( $styl_dvirek ) {
        case 'Hladka':
            return 0;
            break;
        case 'Ramova':
            return 2500;
            break;
        case 'Leskla':
            return 3500;
            break;
        default:
            return 0;
            break;
    }
}
function VypocetVestaveneSpotrebice($spotrebice) {
    $cena = 0;
    $delka = count($spotrebice);
    for($i = 0; $i < $delka; $i++) {
        if($spotrebice[$i] === 'trouba') {
            $cena += 8000;
        } 
        else if($spotrebice[$i] === 'varna_deska') {
            $cena += 6000;
        }
        else if($spotrebice[$i] === 'mycka') {
            $cena += 10000;
        }
        else if($spotrebice[$i] === 'mikrovlnna_trouba') {
            $cena += 5000;
        }
    }
    return $cena;
}
function VypocetMontaze($s_instalaci) {
    if($s_instalaci === 'ano') {
        return 5000;
    }
    else {
        return 0;
    }
}




?>