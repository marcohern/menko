<?php
use Marcohern\Menko\Retail\MercadoLibre\MercadoLibreProductListScrapper;

require_once('vendor/autoload.php');

$gs = new MercadoLibreProductListScrapper();
$r = $gs->scrap("https://listado.mercadolibre.com.co/rtx-3080-ti");
echo json_encode($r);
//$gs->saveBodyTo('samples/ml.html');