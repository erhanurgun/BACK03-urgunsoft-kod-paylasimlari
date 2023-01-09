<?php

//? İki Tarih Arasındaki Zaman Farkının Metinsel Karşılığını Bulma
function timeAgo($date, $full = true)
{
    $arr = [
        '%y' => 'yıl', '%m' => 'ay', '%d' => 'gün',
        '%h' => 'saat', '%i' => 'dakika', '%s' => 'saniye'
    ];
    $result = '';
    $timestamp = strtotime($date);
    $lastDate = new DateTime('@' . $timestamp);
    $nowDate = new DateTime('@' . time());
    foreach ($arr as $key => $val) {
        if (!$full && $key == '%h') break;
        $exist = $lastDate->diff($nowDate)->format($key);
        // $exist = $exist < 10 ? '0' . $exist : $exist;
        $result .= $exist ? "$exist $val " : null;
    }
    return $result . ' önce';
}

#Örnek Kullanım:
$date = '2038-10-10 08:45:15';
echo timeAgo($date) . '<br>';   // Tarih ve zamanı göster
echo timeAgo($date, false);     // Sadece tarihi göster

# Cıktı:
// 16 yıl 1 ay 21 gün 6 saat 58 dakika 7 saniye önce
// 16 yıl 1 ay 21 gün önce

