<?php
//? Türkçe karakterler için SEO link yapısını oluşturma
function seoLink($str, $options = [])
{
    $str = mb_convert_encoding((string)$str, 'UTF-8', "auto");
    $defaults = [
        'delimiter' => '-', 'limit' => null, 'lowercase' => true,
        'replacements' => [], 'transliterate' => true
    ];
    $options = array_merge($defaults, $options);
    $char_map = [
        'Ş' => 'S', 'İ' => 'I', 'Ç' => 'C', 'Ü' => 'U', 'Ö' => 'O', 'Ğ' => 'G',
        'ş' => 's', 'ı' => 'i', 'ç' => 'c', 'ü' => 'u', 'ö' => 'o', 'ğ' => 'g',
    ];
    $rep = $options['replacements'];
    $str = preg_replace(array_keys($rep), $rep, $str);
    if ($options['transliterate']) {
        $str = str_replace(array_keys($char_map), $char_map, $str);
    }
    $str = preg_replace('/[^\p{L}\p{Nd}]+/u', $options['delimiter'], $str);
    $ftr = '/(' . preg_quote($options['delimiter'], '/') . '){2,}/';
    $str = preg_replace($ftr, '$1', $str);
    $opt = $options['limit'] ? $options['limit'] : mb_strlen($str, 'UTF-8');
    $str = mb_substr($str, 0, $opt, 'UTF-8');
    $str = trim($str, $options['delimiter']);
    return $options['lowercase'] ? mb_strtolower($str, 'UTF-8') : $str;
}
# ÖRNEK:
$demoText = "?Bu mEtinde her! Şey} mevCut Çalışı.yoR *";
echo seoLink($demoText);
# ÇIKTI:
// bu-metinde-her-sey-mevcut-calisi-yor

