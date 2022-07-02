<?php
//? TC Doğrulama Methodu
/* NOT:
 ! Güvenlik amaçlı TC kimlik numaraları sansürlenmiştir!
 ! Doğruluğunu test etmek istediğiniz TC'yi parametre olarak gönderiniz!
 * Geçerli bir TC kimlik numarasıyla test işlemi yapabilirsiniz.
*/
function verifyId($personId)
{
    $oddNum = 0;
    $evenNum = 0;
    $firstNine = 0;

    for ($i = 1; $i < 9; $i += 2) {
        $oddNum += $personId[$i];
    }
    for ($i = 0; $i <= 8; $i += 2) {
        $evenNum += $personId[$i];
    }
    for ($i = 0; $i < 9; $i++) {
        $firstNine += $personId[$i];
    }
    $num10 = (($oddNum * 7) - $evenNum) % 10;
    $num11 = ($firstNine + $num10) % 10;
    $newId = substr($personId, 0, 9) . $num10 . $num11;

    if ($personId === $newId) {
        return true;
    }
    return false;
}
# Örnek Kullanım:
echo verifyId('13276502826') ? 'TC Doğrulandı' : 'TC Doğrulanamadı!';
# Çıktı: TC Doğrulandı


