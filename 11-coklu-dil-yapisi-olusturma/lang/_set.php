<?php
ob_start();
session_start();
function setActive($langCode)
{
    if (isset($_SESSION['lang'])) {
        return $langCode === $_SESSION['lang'] ? 'active' : null;
    } else {
        return $langCode === 'tr' ? 'active' : null;
    }
}

$langs = ['tr', 'en'];

if (isset($_GET['lang'])) {
    $lang  = strip_tags(htmlspecialchars($_GET['lang']));
    if (in_array($lang, $langs)) {
        $_SESSION['lang'] = $lang;
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }
}

if (empty($_SESSION['lang'])) {
    require_once 'lang/tr.php';
} else {
    require_once 'lang/' . $_SESSION['lang'] . '.php';
}


