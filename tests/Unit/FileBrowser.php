<?php

namespace Marcohern\Menko\Tests;

use Symfony\Component\BrowserKit\HttpBrowser;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\BrowserKit\Response;

class FileBrowser extends HttpBrowser
{
  protected function doRequest($request): Response
  {
    $file = $this->getFilePath($request->getUri());
    if (!file_exists($file)) {
        return new Response('Page not found', 404, []);
    }
    $content = file_get_contents($file);
    return new Response($content, 200, []);
  }

  private function getFilePath($uri)
  {
    return __DIR__.preg_replace('/^http:\/\/localhost/', '', $uri);
  }
}