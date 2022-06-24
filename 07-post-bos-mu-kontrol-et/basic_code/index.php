<?php
//? Gelen POST değerlerinin boş olma durumunu kontrol et
// $except_these -> kontrol işleminden muaf olanlar
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
    // hata durumu aktifse
    if ($error) { return false; }
    return $data;
}
# Örnek Kullanım:
// $_POST['username']   -> dolu gönderildi
// $_POST['password']   -> boş gönderildi
if ($data = formControl('password')) {
    echo 'Boş bırakılan alan bulunamadı.';
} else {
    echo "Boş bıraktığınız alanlar bulunmaktadır!";
}
?>
<form action="" method="POST"><br>
    <input type="text" name="username"><br><br>
    <input type="text" name="password"><br><br>
    <button type="submit">Gönder</button>
</form>

