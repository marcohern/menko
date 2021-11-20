<?php
namespace Marcohern\Menko\Retail\MercadoLibre;

use Marcohern\Menko\Hyperlink;

class MercadoLibreIndexScrapper extends MercadoLibreBaseScrapper {
    public function __construct($goutte = null)
    {
        parent::__construct($goutte);
    }
}