<?php
//? Gelen POST değerlerinin boş olma durumunu kontrol et
function formControl(...$except_these)
{
    $data = [];
    $error = false;
    // gelen değerleri teker teker oku
    foreach ($_POST as $key => $value) {
        // gelen değer yoksa ve dizi değilse
        if (!in_array($key, $except_these) && !$_POST[$key]) {
            $error = true;
        } else {
            $data[$key] = $_POST[$key];
        }
    }
    if ($error) {
        return false;
    }
    return $data;
}

function isEmpty($postName)
{
    $empty = "Bu alan boş bırakılamaz!";
    if (isset($_POST['submit']) && empty($_POST[$postName]))
        return "<span class=\"omrs-input-helper\">$empty</span>";
}

function isNotEmpty($postName, $className)
{
    if (isset($_POST['submit']) && empty($_POST[$postName]))
        return $className;
    return false;
}
?>

<!DOCTYPE html>
<html lang="tr_TR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POST Değerleri Boş Mu</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <div>
            <h2 class="title">Form Örneği</h4>
                <form action="" method="post">
                    <div class="omrs-input-group">
                        <label class="omrs-input-filled <?= isNotEmpty('username', 'omrs-input-danger'); ?>">
                            <input name="username" value="<?= $_POST['username'] ?? null; ?>">
                            <span class="omrs-input-label">Kullanıcı Adı</span>
                            <?= isEmpty('username'); ?>
                            <img class="img-flex" src="assets/user.svg">
                        </label>
                    </div>
                    <div class="omrs-input-group">
                        <label class="omrs-input-filled <?= isNotEmpty('password', 'omrs-input-danger'); ?>">
                            <input name="password">
                            <span class="omrs-input-label">Şifre</span>
                            <?= isEmpty('password'); ?>
                            <img class="img-flex" src="assets/pass.svg">
                        </label>
                    </div>
                    <div>
                        <button type="submit" class="btn" name="submit">Gönder</button>
                    </div>
                </form>
        </div>
    </div>
</body>

</html>