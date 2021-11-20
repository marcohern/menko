<?php

namespace Marcohern\Menko;

abstract class ScrapperBase {
    private $url = null;

    public function scrap(string $url) {
        $this->url = $url;
    }

    public abstract function saveBodyTo(string $filename);
}