<?php
//? OOP ile Hataları JSON Formatında Özelleştirme
class Errors extends Exception
{
    public function printJSON()
    {
        $data = [
            'line' => $this->line,
            'file' => $this->file,
            'msg' => $this->message,
        ];
        return json_encode($data);
    }
}
try {
    //? Hataları bu kısımda özelleştirilir...
    #ÖR: GET parametresiyle gönderilen değerin tipi sayı değilse
    if (!is_numeric($_GET['id'])) {
        throw new Errors('ID parametresi sayı değil!');
    } else {
        echo $_GET['id'];
    }
} catch (Errors $err) {
    echo $err->printJSON();
}
