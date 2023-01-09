<?php

// $_FILES olarak gönderilen tüm verileri diziye çevir 
// eğer dizi'de ki verilerin hepsi boş değilse, $json['success'] değişkenine "Dosyya başarıyla yüklendi" yaz
// eğer dizi'de ki verilerden biri boşsa, $json['error'] değişkenine "Lütfen en az 1 dosya seçiniz" yaz
// $json değişkenini json_encode() fonksiyonu ile json'a çevir
// json'u ekrana yaz
// json'u ekrana yazdıktan sonra exit() fonksiyonunu çağıran php kodunu yaz

require 'functions.php';

if ($_FILES['dosya']['error'] === 0) {
    $path = 'uploads';
    $extensions = ['jpg', 'png', 'jpeg', 'gif'];
    if (!is_dir($path)) mkdir($path);
    $status = upload($_FILES['dosya'], $path, $extensions);
    if ($status) {
        $json['success'] = "Dosya başarıyla yüklendi";
    } else {
        $allow = implode(', ', $extensions);
        $json['error'] = "Desteklenemeyen dosya uzantısı! \nİzin verilen uzantıları: $allow";
    }
} else {
    $json['error'] = "Lütfen en az 1 dosya seçiniz!";
}

echo json_encode($json);
exit;
