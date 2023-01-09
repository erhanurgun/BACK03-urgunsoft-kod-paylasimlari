<?php
// dosya uzantısına göre veri yükleme işlemine izin veren bir fonksiyon

function upload($file, $path, $extensions = [])
{
    $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
    if (in_array($extension, $extensions)) {
        $newName = uniqid() . '.' . $extension;
        if (move_uploaded_file($file['tmp_name'], $path . '/' . $newName)) {
            return true;
        }
    }
    return false;
}