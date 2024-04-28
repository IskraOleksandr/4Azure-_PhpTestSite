<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Azure PHP test site</title>
</head>
<body>
<h2> Результат:</h2>
<p>
    <?php
    $num1 = $_POST["num1"];
    if (!is_numeric($num1)) {
        echo "Необходимо ввести два числа!";
        return;
    }
    function convertToText($number)
    {
        $array_int = array();
        $array_string = array(
            array(" миллиард", " миллиарда", " миллиардов"),
            array(" миллион", " миллиона", " миллионов"),
            array(" тысяча", " тысячи", " тысяч"),
            array("", "", "")
        );

        $array_int[0] = ($number - ($number % 1000000000)) / 1000000000;
        $array_int[1] = (($number % 1000000000) - ($number % 1000000)) / 1000000;
        $array_int[2] = (($number % 1000000) - ($number % 1000)) / 1000;
        $array_int[3] = $number % 1000;
        $result = "";

        if ($number == 0) $result = "ноль";
        else {
            for ($i = 0; $i < 4; $i++){
                if ($array_int[$i] != 0) {
                    if ((($array_int[$i] - ($array_int[$i] % 100)) / 100) != 0) {
                        switch ((($array_int[$i] - ($array_int[$i] % 100)) / 100)) {
                            case 1: $result .= " сто"; break;
                            case 2: $result .= " двести"; break;
                            case 3: $result .= " триста"; break;
                            case 4: $result .= " четыреста"; break;
                            case 5: $result .= " пятьсот"; break;
                            case 6: $result .= " шестьсот"; break;
                            case 7: $result .= " семьсот"; break;
                            case 8: $result .= " восемьсот"; break;
                            case 9: $result .= " девятьсот"; break;
                        }
                    }
                    if ((($array_int[$i] % 100) - (($array_int[$i] % 100) % 10)) / 10 != 1) {
                        switch ((($array_int[$i] % 100) - (($array_int[$i] % 100) % 10)) / 10) {
                            case 2: $result .= " двадцать"; break;
                            case 3: $result .= " тридцать"; break;
                            case 4: $result .= " сорок"; break;
                            case 5: $result .= " пятьдесят"; break;
                            case 6: $result .= " шестьдесят"; break;
                            case 7: $result .= " семьдесят"; break;
                            case 8: $result .= " восемьдесят"; break;
                            case 9: $result .= " девяносто"; break;
                        }
                        switch ($array_int[$i] % 10) {
                            case 1: if ($i == 2) $result .= " одна";
                                else $result .= " один"; break;
                            case 2: if ($i == 2) $result .= " две";
                                else $result .= " два"; break;
                            case 3: $result .= " три"; break;
                            case 4: $result .= " четыре"; break;
                            case 5: $result .= " пять"; break;
                            case 6: $result .= " шесть"; break;
                            case 7: $result .= " семь"; break;
                            case 8: $result .= " восемь"; break;
                            case 9: $result .= " девять"; break;
                        }
                    } else
                        switch ($array_int[$i] % 100) {
                            case 10: $result .= " десять"; break;
                            case 11: $result .= " одиннадцать"; break;
                            case 12: $result .= " двенадцать"; break;
                            case 13: $result .= " тринадцать"; break;
                            case 14: $result .= " четырнадцать"; break;
                            case 15: $result .= " пятнадцать"; break;
                            case 16: $result .= " шестнадцать"; break;
                            case 17: $result .= " семнадцать"; break;
                            case 18: $result .= " восемнадцать"; break;
                            case 19: $result .= " девятнадцать"; break;
                        }
                    if ($array_int[$i] % 100 >= 10 && $array_int[$i] % 100 <= 19) $result .= $array_string[$i][2];
                    else {
                        switch ($array_int[$i] % 10) {
                            case 1: $result .= $array_string[$i][0]; break;
                            case 4: $result .= $array_string[$i][1]; break;
                            case 0: $result .= $array_string[$i][2]; break;
                        }
                    }
                }
            }
        }
        return trim($result);
    }
    echo convertToText($num1);
    ?>
</p>
</body>
</html>