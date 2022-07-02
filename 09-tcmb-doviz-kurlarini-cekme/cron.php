<?php
$link       = 'https://www.tcmb.gov.tr/kurlar/today.xml';
$content    = simplexml_load_file($link);
$currencies = [];

for ($i = 0; $i <= 22; $i++) {
    $currencies[$i] = [
        'unit'             => $content->Currency[$i]->Unit,
        'name'             => $content->Currency[$i]->Isim,
        'forex_buying'     => $content->Currency[$i]->ForexBuying,
        'forex_selling'    => $content->Currency[$i]->ForexSelling,
        'banknote_buying'  => $content->Currency[$i]->BanknoteBuying,
        'banknote_selling' => $content->Currency[$i]->BanknoteSelling
    ];
}


