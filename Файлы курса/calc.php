<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Калькулятор на PHP</title>
    <style>
        input, button {
            margin-bottom: 10px;
            text-align: center;
        }

        input {
            width: 120px;
        }

        button {
            width: 62px;
        }

        .pressed {
            background-color: aqua;
        }
    </style>
    
</head>
<body>
    <h1>Калькулятор на PHP</h1>
    <?php
        $x =""; $y =""; $z ="";
        $cscPlus =""; $cscMinus ="";
        if (isset($_REQUEST["txtX"])) {
            $x = $_REQUEST["txtX"];
            $y = $_REQUEST["txtY"];
            if (isset($_REQUEST["btnPlus"])) {
                $z = $x + $y;
                $cscPlus = "pressed";
            }
            else {
                $z = $x - $y;
                $cscMinus = "pressed";
            }
        }
    ?>
    <form>
        <input type="text" name="txtX" value="<?=$x?>" /> <br />
        <input type="text" name="txtY" value="<?=$y?>" /> <br />
        <button name="btnPlus" class= "<?=$cscPlus?>">+</button>
        <button name="btnMinus" class= "<?=$cscMinus?>">-</button> <br />
        <input type="text" name="txtZ" value="<?=$z?>" />
    </form>
    <textarea></textarea>
</body>
</html>