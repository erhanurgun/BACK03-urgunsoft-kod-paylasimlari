<?php
//? GET ve POST işlemlerinin güvenliğini sağlama
// POST İşlemi:
function post($name)
{
    // POST işlemi yapıldıysa
    if (isset($_POST[$name])) {
        // gelen POST verileri diziyse
        if (is_array($_POST[$name])) {
            // dizi olarak döndür
            return array_map(function ($item) {
                return htmlspecialchars(trim($item));
            }, $_POST[$name]);
        }
        // boşluk ve HTML elemenlerini temizle
        return htmlspecialchars(trim($_POST[$name]));
    }
}

// GET İşlemi:
function get($name)
{
    if (isset($_GET[$name])) {
        if (is_array($_GET[$name])) {
            return array_map(function ($item) {
                return htmlspecialchars(trim($item));
            }, $_GET[$name]);
        }
        return htmlspecialchars(trim($_GET[$name]));
    }
}
