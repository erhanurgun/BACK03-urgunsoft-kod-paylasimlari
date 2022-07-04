<?php require 'lang/_set.php'; ?>

<!DOCTYPE html>
<html lang="<?= $lang['code']; ?>">

<head>
    <meta charset="utf-8">
    <title><?= $lang['title']; ?> | erhanurgun.com.tr</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="lang" style="margin-top: 20px !important;">
        <a href="?lang=tr" class="btn <?= setActive('tr'); ?>">
            <?= $lang['btn_tr']; ?>
        </a>
        <a href="?lang=en" class="btn <?= setActive('en'); ?>">
            <?= $lang['btn_en']; ?>
        </a>
    </div>
</body>

</html>

