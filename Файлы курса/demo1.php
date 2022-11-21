<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Demo</title>
</head>
<body>
    <h1> Демо PHP </h1>
    <?php
        $x = 2;
        $y = 2;
        $z = $x + $y;
        echo "<h3>Результат: $z</h3>";

        date_default_timezone_set("Europe/Moscow");
        $now = date("H:i:s");
        echo "<h2>Страница открыта в $now</h2>";
       
        $hour = date("H");
        if ($hour < 5) {
            echo ("<h1>Доброй ночи!</h1>");
        }
        
        if ($hour >= 5 and $hour < 12) {
            echo ("<h1>Доброе утро!</h1>");
        }

        if ($hour >= 12 and $hour < 16) {
            echo ("<h1>Добрый день!</h1>");
        }
        
        if ($hour >= 16) {
            echo ("<h1>Добрый вечер!</h1>");
        }
    ?>
</body>
</html>