<?php
require_once __DIR__ . '../../vendor/autoload.php';

class Helpers {

    public function generateBarcode($code)
    {
        # code...
        $barcode = new Picqer\Barcode\BarcodeGeneratorPNG();
        return $barcode->getBarcode($code, $barcode::TYPE_CODE_128);
    }

}