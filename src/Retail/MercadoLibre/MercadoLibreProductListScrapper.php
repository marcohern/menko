<?php
namespace Marcohern\Menko\Retail\MercadoLibre;

use Marcohern\Menko\Hyperlink;

class MercadoLibreProductListScrapper extends MercadoLibreBaseScrapper {

    public function scrap(string $url): array
    {
        parent::scrap($url);
        $json = $this->scrapPreloadedState();
        return $this->parsePreloadedState($json);
    }

    protected function scrapPreloadedState() {
        $html = $this->crawler->html();
        $m = null;
        preg_match('/window.__PRELOADED_STATE__\s*=\s*({.*});\s*}},{s:/', $html, $m);
        return $m[1];
    }

    protected function parsePreloadedState(string &$json): array
    {
        return [json_decode($json)];
    }

}