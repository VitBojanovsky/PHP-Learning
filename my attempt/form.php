<?php
$method = $_SERVER['REQUEST_METHOD'] ?? 'GET';

$raw = $_POST['oblibeny_dinosaurus'] ?? $_POST['oblibeny dinosaurus'] ?? null;
$oblibeny_dinosaurus = trim((string)$raw);

if ($oblibeny_dinosaurus === '')
    {
        $oblibeny_dinosaurus = 'ERROR_PRAZDNY_INPUT';
    }

?>
<!DOCTYPE html>
<html lang="en">    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Response</title>
</head>
<body>
    <?php for ($i = 0;$i<20;$i++) {
    echo htmlspecialchars($i+1 . " tvuj oblibeny dinosaurus je " . $oblibeny_dinosaurus, ENT_QUOTES, 'UTF-8'); 
    ?>
    <br>
<?php
    } ?>
</body>
</html>
