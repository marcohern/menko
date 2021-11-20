<?php

namespace Marcohern\Menko\Tests;


use PHPUnit\Framework\TestCase;
use Marcohern\Menko\Retail\MercadoLibre\MercadoLibreIndexScrapper;

class SampleTest extends TestCase {
    protected $scrapper;
    protected $fsgoutte;
  
    protected function setUp(): void
    {
      parent::setUp();
      $this->fsgoutte = new FileBrowser;
      $this->scrapper = new MercadoLibreIndexScrapper($this->fsgoutte);
      //$this->scrapper->displayOutput(false);
    }
  
    protected function tearDown(): void
    {
      $this->scrapper = null;
      parent::tearDown();
    }

    public function test_sample() {
        $this->scrapper->scrap("/tests/Samples/mercadolibre/index.html");
        $this->assertTrue(true);
    }
}