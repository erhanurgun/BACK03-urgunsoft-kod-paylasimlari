<?php
//? T.C. kimlik numarasının doğruluğunu e-devlet üzerinden kontrol eden sınıf

class TCKimlikNoDogrula
{
    private $ad;                    
    private $soyad;                
    private $dogumYili;             
    private $tcKimlikNo;            

    public function __construct($tcKimlikNo, $ad, $soyad, $dogumYili)
    {                               // T.C. kimlik numarası, ad, soyad ve doğum yılı parametre olarak alınır   
        $this->ad = $ad;
        $this->soyad = $soyad;
        $this->dogumYili = $dogumYili;
        $this->tcKimlikNo = $tcKimlikNo;
    }

    public function dogrula()       // T.C. kimlik numarasının doğruluğunu kontrol eden fonksiyon
    {
        $url = "https://tckimlik.nvi.gov.tr/Service/KPSPublic.asmx?WSDL";   // E-devlet servis adresi
        $client = new SoapClient($url);                 // SoapClient sınıfı ile e-devlet servisine bağlanılır
        $result = $client->TCKimlikNoDogrula([   
            'Ad' => $this->ad,
            'Soyad' => $this->soyad,
            'DogumYili' => $this->dogumYili,
            'TCKimlikNo' => $this->tcKimlikNo
        ]);                                             // E-devlet servisine parametreler gönderilir
        return $result->TCKimlikNoDogrulaResult;        // E-devlet servisinden dönen sonuç döndürülür
    }
}

// Örnek Kullanım:
$tcKimlikNoDogrula = new TCKimlikNoDogrula('100000000002', 'Ad', 'Soyad', '1905');   // Nesne oluşturulur  
echo $tcKimlikNoDogrula->dogrula() ? 'Doğrulandı' : 'Doğrulanamadı';                 // Kontrol edilir

/* NOT: 
   E-devlet servisine bağlanmak için SoapClient sınıfı kullanılmıştır. 
   SoapClient sınıfı PHP 5.0.0 sürümünden itibaren kullanılmaktadır. 
   Eğer SoapClient sınıfı kullanılamıyorsa, php.ini dosyasında extension=soap satırının başında ki ; işareti kaldırılarak aktif edilmesi gerekir.
   Eğer PHP sürümünüz 5.0.0 sürümünden küçükse SoapClient sınıfını kullanamazsınız. 
   Eğer SoapClient sınıfını kullanamazsanız e-devlet servisine bağlanmak için CURL kütüphanesini kullanabilirsiniz. 
 */
