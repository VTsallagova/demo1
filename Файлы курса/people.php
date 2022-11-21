<?php
//Здесь кошмар с точки зрения безопастности, т.к. слабый пароль. //И нарушен принцип "Наименьших привилегий". 
$conn = mysqli_connect('localhost: 3306','tc_user','Pa$$w0rd', 'tc'); //функция, чтобы приконнектится к БД: 'порт', 'имя пользователя', 'пустой пароль', 'имя БД'. Функуия mysqli_connect возвращает некоторую переменную $conn, на которую мы должны получить ссылку, чтобы приконнектится к БД

if (isset($_REQUEST["filter"]))
    $letters = $_REQUEST["filter"];
else 
    $letters = "";

$sql = "SELECT FirstName, LastName, Job FROM people WHERE LastName LIKE '$letters%' ORDER BY LastName"; //Делаем запрос sql: выбрать FirstName, LastName из таблицы БД people

$result = mysqli_query($conn, $sql); // Функция, которая позволяет выполнить запрос на получение результата (через переменную $result). В скобках передаём ей переменные 1. котрая коннектится с БД, 2. Которая говорит, что мы хотим получить.
//var_dump($result); //Чтобы вывести результат в более понятном виде, мы используем функцию var_dump
$people = mysqli_fetch_all($result); //Как из переменно $result получить данные. Вызываем функцию mysqli_fetch_all(), передаём/ извлекаем мы данные в result, поэтому mysqli_fetch_all($result)
//var_dump($people);

foreach($people as $person) { //Выводим данные через цикл foreach, чтобы пользователь мог их прочитать.$person - это переменная цикла.
    $firstName = $person[0];
    $lastName = $person[1];
    //echo "$firstName $lastName<br />"; //Выводит данные. <br /> - позволяет сделать перевод строки.
}

mysqli_close($conn); //Закрываем фукцию
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Люди из БД</title>
    <style>
        table {
            width: 40%;

        }

        th {
            background-color: blanchedalmond;
            color: while;
        }

        tr:nth-child(odd) {
            background-color: lightblue;
        }

        form {
            margin-bottom: 10px;
        }

    </style> 

</head>
<body>
    <h1>Получение данных и вывод из БД с помощью PHP</h1>
    <form> <!--Делаем строку поиска-->
        <input name="filter" value="<?=$letters?>" /> <!--Делаем, чтобы букву по которой мы ищем, отправлялась на сервер-->
        <button>Найти</button> <!--Кнопка найти-->
    </form>
    <table border="1">
        <tr>  <!--Это табличный ряд-->
            <th>№</th>
            <th>Имя</th> <!--Заголовки колонок, будут жирным курсивом-->
            <th>Фамилия</th>
            <th>Должность</th>
        </tr>

        
    <!--Используя ранее написаный цикд foreach я хочу в браузер вывести список людей (см. ниже)-->
    <?php 
        $n = 1; //Переменная являющая счётчиком по порядку
        foreach($people as $person) { //Выводим данные через цикл foreach, чтобы пользователь мог их прочитать.$person - это переменная цикла.
         $firstName = $person[0];
         $lastName = $person[1];
         $Job = $person[2];
         echo "<tr>
                    <td>$n</td>
                    <td>$firstName</td>
                    <td>$lastName</td>
                    <td>$Job</td>
                <tr>"; //Выводит данные, в табличном виде.
         $n += 1; //Чтобы по порялку числа шли.
        }
    ?>
</body>
</html>