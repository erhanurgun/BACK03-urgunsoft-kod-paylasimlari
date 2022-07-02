<?php
//? Aile Bireyinin TC'sini Öğrenme Methodu
/* NOT: Bu işlem sadece istenen TC ile aranan TC'lerin ilk 3 hanesi benzer
   olduğu zaman işe yaramaktadır. Tüm TC kimlik numaraları için işe yaramamakta!
 ! Bu yöntem tarafımdan tesadüf eseri bulunmuş olup kardeşlerimde işe yaramıştır!
*/
function findFamilyId($callerId, $sizeNum)
{
    $id[]  = null;
    for ($i = 1; $i <= 9; $i++) {
        $id[$i] = substr(trim($callerId), $i - 1, 1);
        if ($i == 9) {
            $id[5] += 3 * $sizeNum;
            $id[9] -= 1 * $sizeNum;
            if ($id[5] > 9) { $id[4] += 1; $id[5] %= 10; }
            if ($id[5] < 0) { $id[4] += 1; $id[5] = ($id[5] * -1) % 10; }
            if ($id[9] < 0) { $id[8] += 1; $id[9] = ($id[9] * -1) % 10; }
        }
    }
    $oddNum = 0; $evenNum = 0; $firstNine = 0;

    for ($i = 1; $i <= 9; $i += 2) $oddNum  += $id[$i];
    for ($i = 2; $i <= 8; $i += 2) $evenNum += $id[$i];
    for ($i = 1; $i <= 9; $i++) $firstNine  += $id[$i];

    $num10  = (($oddNum * 7) - $evenNum) % 10;
    $num11  = ($firstNine + $num10) % 10;
    $newId = substr(implode('', $id), 0, 9) . $num10 . $num11;
    return $newId;
}
# Örnek Kullanım:
/* parametre TC'sinden bir büyük olan için  1, iki büyük olan için  2 
 * parametre TC'sinden bir küçük olan için -1, iki büyük olan için -2 vb...
*/
echo "Büyük Kardeş: " . findFamilyId('13276502826', 1) . ' - ';
echo "Küçük Kardeş: " . findFamilyId('13276502826', -1);
# Çıktı:
// Büyük Kardeş: 13279502762 - Küçük Kardeş: 13273502980


