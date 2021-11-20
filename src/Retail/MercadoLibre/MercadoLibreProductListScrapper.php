<?php
namespace Marcohern\Menko\Retail\MercadoLibre;

use Marcohern\Menko\Hyperlink;

class MercadoLibreProductListScrapper extends MercadoLibreBaseScrapper {

    public function scrap(string $url): array
    {
        parent::scrap($url);
        $r = $this->scrapPreloadedState();
        echo $r;
        return [];
    }

    protected function scrapPreloadedState() {
        $html = $this->crawler->html();
        $m = null;
        preg_match('/window.__PRELOADED_STATE__\s*=\s*({.*});\s*}},{s:/', $html, $m);
        return $m[1];
    }

}