<?php

//? Metinsel ifadeyi slug (SEO uyumlu) olarak dönüştürüren fonksiyon

function slugify($text)
{
    // Türkçe karakterleri desteklemek için ~[^\pL\d]+~u kullanıyoruz
    $text = preg_replace('~[^\pL\d]+~u', '-', $text);
    // Türkçe karakterleri dönüştürüyoruz
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
    // Tüm özel karakterleri sil
    $text = preg_replace('~[^-\w]+~', '', $text);
    // Başta ve sonda - karakteri varsa sil
    $text = trim($text, '-');
    // Birden fazla - karakterini tek - karakterine dönüştür
    $text = preg_replace('~-+~', '-', $text);
    // Tüm karakterleri küçük harfe dönüştür
    $text = strtolower($text);
    if (!empty($text)) {         // Eğer slug boş değilse
        return $text;            // Slug döndür
    }
}

// kullanım örneği:
echo slugify('bu metinde ç ö ş ğ ü ı * # karakter $ @ ! ?  kullanılamaz');
// çıktı: bu-metinde-c-o-s-g-u-i-karakter-kullanilamaz