<?php
require_once __DIR__ . '/functions.php';
require_once __DIR__ . '/data.php';

if (!empty($_POST)) {
    $fields = load($fields);

    if ($errors = validate($fields)) {
        echo $errors;
    } else {
        echo "<li class = 'good' > Номер карты введен корректно </li>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Document</title>
</head>

<body>


    <link href='https://fonts.googleapis.com/css?family=Share+Tech+Mono' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Signika:400' rel='stylesheet' type='text/css'>
    <div class="card-holder">
        <div class="card">
            <span class="title">Bank of Russia</span>

            <img class="chip" src="https://cdn-icons-png.flaticon.com/512/8654/8654977.png">
            <?php
            if (!empty($fields['number']['value'])) {
                if ($fields['number']['value'][0] == 5) {
                    echo '<img class="mc" src="https://brand.mastercard.com/content/dam/mccom/brandcenter/thumbnails/mastercard_circles_92px_2x.png">';
                } elseif ($fields['number']['value'][0] == 4) {
                    echo '<img class="mc" src="https://cdn-icons-png.flaticon.com/512/5968/5968397.png">';
                } elseif ($fields['number']['value'][0] == 3 || $fields['number']['value'][0] == 6) {
                    echo '<img class="mc" src="https://brand.mastercard.com/content/dam/mccom/brandcenter/thumbnails/mcbc_dla_maestro-vrt-rev_60px.png">';
                } elseif ($fields['number']['value'][0] == 1 && $fields['number']['value'][1] == 4 || $fields['number']['value'][0] == 8 && $fields['number']['value'][1] == 1 || $fields['number']['value'][0] == 9 && $fields['number']['value'][1] == 9) {
                    echo '<img class="mc" src="https://cdn-icons-png.flaticon.com/512/1345/1345540.png">';
                }
            }


            ?>
            <span class="holo-back"></span>
            <span class="holo"></span>
            <br>
            <form method="post" action="index.php">
                <div class="form-group">
                    <input class="inp" type="number" name="number">

                </div>
                <button type="submit" class="inpbtn"></button>
            </form><br><br>
            <span class="small-type">UNTIL END</span><br><br>
            <span class="emboss exp">10/28</span><br><br>
            <span class="emboss name">ANDREW ZHERZDEV</span>
        </div>
    </div>

</body>

</html>