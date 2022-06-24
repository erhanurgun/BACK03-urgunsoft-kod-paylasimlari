<?php
// PHPMailer sınıfı: https://github.com/PHPMailer/PHPMailer
//? PHPMailer ile mail gönderme işlemi
function sendEmail($email, $name, $subject, $message)
{
    // Mailerden nesne türet
    $mail = new PHPMailer(true);
    try {
        // Sunucu Ayarları
        // $mail->SMTPDebug = 2;
        $mail->isSMTP();
        $mail->Host       = $_POST['smtp_host'];        // erhanurgun.com.tr
        $mail->SMTPAuth   = true;
        $mail->Username   = $_POST['smtp_email'];       // ornek@erhanurgun.com.tr
        $mail->Password   = $_POST['smtp_password'];    // deneme123
        $mail->SMTPSecure = $_POST['smtp_secure'];      // TLS - SSL
        $mail->Port       = $_POST['smtp_port'];        // 465
        $mail->CharSet    = 'UTF-8';
        // Gönderici
        $mail->setFrom($_POST['smtp_send_email'], $_POST['smtp_send_name']);
        // Alıcı
        $mail->addAddress($email, $name);
        // İçerik
        $mail->isHTML(true);
        $mail->Subject = $subject;                      // Konu
        $mail->Body    = $message;                      // Mesaj
        // Mesajı gönder
        $mail->send();
        echo 'Mesaj başarıyla gönderildi';
        return true;
    } catch (Exception $e) {
        echo "Mesaj Gönderilemedi. Mail Hatası: {$mail->ErrorInfo}";
        return false;
    }
}
# Örnek Kullanım:
$send = sendEmail($data['email'], $data['name'], $data['subject'], $data['message']);
if ($send) {
    $json['success'] = 'Mesajınız başarıyla gönderildi.';
} else {
    $json['error'] = 'Mesaj gonderilirken bir sorun oluştu!';
}


