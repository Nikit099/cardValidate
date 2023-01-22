<?php


function debug($data)
{
    foreach ($data as $k => $v) {
        echo "<h1>  {$data[$k]['value']} </h1>";
    }
}

function console_log($data)
{
    if (is_array($data) || is_object($data)) {
        echo ("<script>console.log('php_array: " . json_encode($data) . "');</script>");
    } else {
        echo ("<script>console.log(' " . $data . "');</script>");
    }
}
function load($data)
{
    foreach ($_POST as $k => $v) {
        if (array_key_exists($k, $data)) {
            $data[$k]['value'] = trim($v);
        }
    }
    return $data;
}
function validate($data)
{
    $errors = '';
    foreach ($data as $k => $v) {
        $number = $data[$k]['value'];
        $lun = null;
        if ($data[$k]['requered'] && empty($number)) {
            $errors .= "<li> НЕ заполнено поле: {$data[$k]['field_name']} </li>";
        } elseif ((int) $number) {
            for ($i = 0; $i < strlen($number); $i++) {
                if ($i % 2 === 0) {
                    $ex = $number[$i] * 2;

                    $ex = (string) $ex;
                    if (strlen($ex) === 2) {
                        $ex = (int) $ex[0] + (int) $ex[1];
                    }

                    $lun += $ex;
                } else {
                    $lun += $number[$i];
                }
            }
            $lun = (string) $lun;
            if ($number[0] != 3  &&  $number[0] != 4 &&  $number[0] != 5 &&  $number[0] != 6) {
                $errors .= "<li> Такой тип карты не принимается </li>";
            }
            if ($number[0] == 1 &&  $number[1] == 4 ||  $number[0] == 8 &&  $number[1] == 1 ||  $number[0] == 9 &&  $number[1] == 9) {
                $errors = '';
            }
            if ($lun[strlen($lun) - 1] != 0 || strlen($number) != 14 && strlen($number) != 16) {
                $errors .= "<li> Номер карты введен не верно </li>";
            }
        }
    }
    return $errors;
}
// 5536914093398562
// 14 81 99