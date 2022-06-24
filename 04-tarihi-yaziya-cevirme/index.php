<?php
//? Bir tarihin yazısal kaşılığını gösterme
date_default_timezone_set('Europe/Istanbul');
function timeConvert($time)
{
    $time      = strtotime($time);
    $time_diff = time() - $time;
    $second    = $time_diff;
    $minute    = round($time_diff / 60);
    $hour      = round($time_diff / 3600);
    $day       = round($time_diff / 86400);
    $week      = round($time_diff / 604800);
    $month     = round($time_diff / 2419200);
    $year      = round($time_diff / 29030400);
    if ($second < 60) {
        if ($second == 0) { return "az önce"; } 
        else { return $second . ' saniye önce'; }
    } else if ($minute < 60) {
        return $minute . ' dakika önce';
    } else if ($hour < 24) {
        return $hour . ' saat önce';
    } else if ($day < 7) {
        return $day . ' gün önce';
    } else if ($week < 4) {
        return $week . ' hafta önce';
    } else if ($month < 12) {
        return $month . ' ay önce';
    } else {
        return $year . ' yıl önce';
    }
}
# Örnek Kullanım:
echo timeConvert("2022-05-06 07:13:59");
// 51 saniye önce



