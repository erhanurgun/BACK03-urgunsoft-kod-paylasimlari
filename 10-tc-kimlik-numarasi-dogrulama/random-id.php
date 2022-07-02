<?php
//? Rastgele TC Oluşturma Methodu
function randomCreateId()
{
    $id = [];
    $oddNum = 0;
    $evenNum = 0;
    $firstNine = 0;

    for ($i = 0; $i < 9; $i++) {
        $id[$i] = rand(1, 9);
    }
    for ($i = 1; $i < 9; $i += 2) {
        $oddNum += $id[$i];
    }
    for ($i = 0; $i <= 8; $i += 2) {
        $evenNum += $id[$i];
    }
    for ($i = 0; $i < 9; $i++) {
        $firstNine += $id[$i];
    }

    $num10  = (($oddNum * 7) - $evenNum) % 10;
    $num11  = ($firstNine + $num10) % 10;
    $newId = substr(implode('', $id), 0, 9) . $num10 . $num11;
    return $newId;
}
# Örnek Kullanım:
echo randomCreateId();
# Çıktı: 17644313166

