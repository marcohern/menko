<?php

namespace Marcohern\Menko\Tests;

use PHPUnit\Framework\TestCase;
use Marcohern\Menko\MercadoLibre\MercadoLibreIndexScrapper;

class SampleTest extends TestCase {

    public function test_sample() {
        $gs = new MercadoLibreIndexScrapper();
        $gs->scrap("https://www.mercadolibre.com.co/");
        $this->assertTrue(true);
    }
}