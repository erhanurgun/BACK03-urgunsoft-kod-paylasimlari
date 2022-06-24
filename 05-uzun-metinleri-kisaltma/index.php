<?php
//? Uzun metinleri güvenli bir şekilde kısaltma
function cutText($str, $limit = 150)
{
    $str = trim(strip_tags(htmlspecialchars_decode($str)));
    $lenght = strlen($str);
    if ($lenght > $limit) {
        $str = mb_substr($str, 0, $limit, 'UTF-8') . '...';
    }
    return $str;
}

# ÖRNEK:
$text = "Lorem ipsum dolor sit amet consectetur adipisicing
elit. Nisi, nostrum? Libero harum dicta incidunt quaerat corrupti 
minus inventore aliquid rem, dolore eaque ducimus? Corporis 
iure ullam earum fugit consequatur voluptates.";
echo cutText($text, 20);

# ÇIKTI:
// Lorem ipsum dolor si...


