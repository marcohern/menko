<?php

namespace Marcohern\Menko\Retail\MercadoLibre;

use Marcohern\Menko\GoutteScrapper;
use Marcohern\Menko\Hyperlink;

class MercadoLibreBaseScrapper extends GoutteScrapper {

    public function __construct($goutte = null)
    {
        parent::__construct($goutte);
    }

    public function scrapJson(string $url): mixed
    {
        $mlmenu = parent::scrapJson($url);
        $menu = [];
        $menu = $this->parseList($mlmenu->high_priority);
        $menu = array_merge($menu, $this->parseDepartments($mlmenu->departments));
        $menu = array_merge($menu, $this->parseList($mlmenu->landings));
        return $menu;
    }
    
    protected function parseList(array &$anchors): array
    {
        $list = [];
        foreach ($anchors as $anchor) {
            $title = (!empty($anchor->label)) ? $anchor->label : (
                (!empty($anchor->name)) ? $anchor->name : null
            ); 
            if (empty($title)) break;
            $list[] = new Hyperlink($title, $anchor->permalink);
        }
        return $list;
    }

    protected function parseDepartments(array $anchors): array
    {
        $departments = [];
        foreach ($anchors as $anchor) {
            $department = new Hyperlink($anchor->name, "");
            $department->setChildren($this->parseCategories($anchor->categories));
            $departments[] = $department;
        }
        return $departments;
    }

    protected function parseCategories(array $anchors): array
    {
        $categories = [];
        foreach ($anchors as $anchor) {
            $category = new Hyperlink($anchor->name, $anchor->permalink);
            if (!empty($anchor->categories)) $category->setChildren($this->parseList($anchor->children_categories));
            $categories[] = $category;
        }
        return $categories;
    }

}