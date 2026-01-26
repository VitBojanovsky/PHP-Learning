<?php
$method = $_SERVER['REQUEST_METHOD'] ?? 'GET';

$raw = $_POST['oblibeny_dinosaurus'] ?? $_POST['oblibeny dinosaurus'] ?? null;
$oblibeny_dinosaurus = trim((string)$raw);

if ($oblibeny_dinosaurus === '') {
    $oblibeny_dinosaurus = 'trex';
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
    <h1><?php echo htmlspecialchars("tvuj oblibeny dinosaurus je " . $oblibeny_dinosaurus, ENT_QUOTES, 'UTF-8'); ?></h1>
</body>
</html>
