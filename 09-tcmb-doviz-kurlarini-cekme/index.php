<?php require 'cron.php'; ?>
<!DOCTYPE html>
<html lang="tr-TR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="https://erhanurgun.com.tr/assets/img/favicon.svg">
    <meta http-equiv="refresh" content="10" >
    <title>TCMB Döviz Kurları | PHP Botu</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <table>
            <tr class="head">
                <th width="400">Adı</th>
                <th>Birimi</th>
                <th>Alışı</th>
                <th>Satışı</th>
                <th>Efektif Alışı</th>
                <th>Efektif Satışı</th>
            </tr>
            <?php foreach ($currencies as $key => $curr) : ?>
                <tr class="body <?= $key % 2 == 0 ? 'row' : null; ?>">
                    <td><?= $curr['name']; ?></td>
                    <td><?= $curr['unit']; ?></td>
                    <td><?= $curr['forex_buying']; ?></td>
                    <td><?= $curr['forex_selling']; ?></td>
                    <td><?= $curr['banknote_buying']; ?></td>
                    <td><?= $curr['banknote_selling']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>

</html>

