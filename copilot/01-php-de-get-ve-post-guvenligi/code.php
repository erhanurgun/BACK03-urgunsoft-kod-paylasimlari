<?php
//? $_POST ve $_GET için gelişmiş güvenlik önlemlerini kontrol eden ve daha sonra veriyi geri döndüren sınıf

class Input
{
    public static function get($key, $default = null)
    {
        if (isset($_POST[$key])) {                  // $_POST[$key] varsa
            return self::clean($_POST[$key]);       // $_POST[$key] temizlenmiş halini döndür
        } elseif (isset($_GET[$key])) {             // $_GET[$key] varsa
            return self::clean($_GET[$key]);        // $_GET[$key] temizlenmiş halini döndür
        } else {                                    // $_POST[$key] ve $_GET[$key] yoksa
            return $default;                        // varsayılan değeri döndür (null)         
        }
    }

    public static function clean($value)
    {
        if (is_array($value)) {                     // $value bir dizi ise
            foreach ($value as $key => $val) {      // $value dizisindeki her bir eleman için    
                $value[$key] = self::clean($val);   // $value dizisindeki elemanları temizlenmiş haline eşitle
            }                                       // ve $value dizisini döndür       
        } else {                                    
            $value = trim($value);                  // $value'nin başındaki ve sonundaki boşlukları sil
            $value = stripslashes($value);          // $value'nin içindeki ters slash'ları sil
            $value = htmlspecialchars($value);      // $value'nin içindeki html etiketlerini sil
        }

        return $value;                              // $value'yu döndür
    }
}

// Kullanımı
$name = Input::get('name');                         // $_POST['name'] veya $_GET['name'] değerini al
