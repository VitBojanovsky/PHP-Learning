<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Přihlášení</title>
    <link rel="stylesheet" href="css.css">
</head>
<body>
    <h1>Login</h1>
    <form action="login_backend.php" method="post" id="loginFORM">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <button type="submit">Login</button>
    </form>
</body>
</html>

<?php 
$auth = false;
session_start();
$heslo = $_POST['password'] ?? '';
$jmeno = $_POST['username'] ?? '';

$uzivatele = ['admin', 'vitecek','jirka'];
$tajny_hesla = ['admin123', 'vitecek123', 'jirka123'];

if(!isset($heslo) or !isset($jmeno)) {
    echo("Neplatny input");
}
try {
    if(count($uzivatele) == count($tajny_hesla)) {
    } 
    else {
        throw new Exception();
    }
}
catch (Exception $e) {
    //pocet hesel a uzivatelu se neshoduje
    echo("Interni chyba");
}


for($i = 0; $i<count($uzivatele); $i++) {
    if($heslo == $tajny_hesla[$i] and $jmeno == $uzivatele[$i]) {
        $auth = true;
        break;
    }
}

if ($auth) {
    $_SESSION['auth'] = true;
    $_SESSION['username'] = $jmeno;
} else {
    $_SESSION['auth'] = false;
    unset($_SESSION['username']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prihlasovaci udaje</title>
    <h1><?php if($auth) { echo "Prihlaseni uspesne"; } else { echo "Neplatny login"; } ?></h1>
    <p><?php echo("zadane username = " . $jmeno); ?></p>
    <p><?php echo("zadane heslo = " . $heslo); ?></p>
    <?php 
        echo '<form action="" method="get">
        <button type="submit" name="logout">Logout</button>
        </form>';
    echo isset($_GET['logout']) ? session_destroy() : '';
    
    
    ?>
</head>
<body>
    
</body>
</html>