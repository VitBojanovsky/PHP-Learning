<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuchyn cena</title>
</head>
<body>
    <h1>Nakonfigurujte si vasi kuchynskou linku</h1>
    <form action="main.php" method="post">
        <label for="rozmer">Rozmer kuchyne (v metrech):</label>
        <input type="number" id="rozmer" name="rozmer" required>
        <br>
        <select id="barva" name="barva">
            <option value="bila">Bila</option>
            <option value="seda">Seda</option>
            <option value="cerna">Cerna</option>
            <option value="drevo">Drevo</option>
        </select>  
        <br>
        <label for="material">Material:</label>
        <select id="material" name="material">
            <option value="lamino">Lamino</option>
            <option value="masiv">Masiv</option>
            <option value="dsp">DSP</option>
        </select>
        <br><br>
        
        <label for="doplňky">Doplňky:</label><br>
        <input type="checkbox" id="osvetleni" name="doplňky[]" value="osvetleni">
        <label for="osvetleni">Osvetleni</label><br>
        <input type="checkbox" id="mysacka" name="doplňky[]" value="mysacka">
        <label for="mysacka">Mysacka</label><br>
        <input type="checkbox" id="digestor" name="doplňky[]" value="digestor">
        <label for="digestor">Digestor</label><br><br>
        
        <input type="submit" value="Vypocitat cenu">
    </form>
</body>
</html>