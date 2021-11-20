<?php

namespace Marcohern\Menko;

class Hyperlink {
    public $text = null;
    public $href = null;
    public $children = [];

    public function __construct(string $text, string $href) {
        $this->href = $href;
        $this->text = $text;
    }

    public function setChildren(array $children) {
        $this->children = $children;
    }

    public function addChild(Hyperlink $link) {
        $this->children[] = $link;
    }
}