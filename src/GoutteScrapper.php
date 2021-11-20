<?php
namespace Marcohern\Menko;

use Goutte\Client as Goutte;

class GoutteScrapper extends ScrapperBase {

    protected $goutte = null;
    protected $crawler = null;

    public function __construct($goutte=null) {
        $this->goutte = empty($goutte) ? new Goutte() : $goutte;
    }

    public function scrap(string $url) : array
    {
      parent::scrap($url);
      $this->crawler = $this->goutte->request('GET',$url);
      return [];
    }

    public function scrapJson(string $url) : mixed
    {
        parent::scrap($url);
        $this->goutte->request('GET',$url);
        return json_decode($this->goutte->getResponse()->getContent());
    }

    public function saveBodyTo(string $filename)
    {
        file_put_contents($filename, $this->crawler->html());
    }

    protected function scrapHyperlinks() : array
    {
        $hyperlinks = [];
        $this->crawler->filter('a')->each(function ($a) use (&$hyperlinks) {
            $hyperlinks[] = new Hyperlink($a->text(), $a->attr('href'));
        });
        return $hyperlinks;
    }
}