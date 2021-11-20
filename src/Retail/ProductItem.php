<?php

namespace Marcohern\Menko\Retail;

class ProductItem {
    public $title = null;
    public $url = null;
    public $price = null;
    public $imageUrls = [];

    public function __construct(string $title, string $url, float $price = null)
    {
        $this->title = $title;
        $this->url = $url;
        $this->price = $price;
    }
}