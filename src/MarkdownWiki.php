<?php

namespace Interart\MarkdownWiki;

define('DS', DIRECTORY_SEPARATOR);
define('ROOT_CONTENTS', dirname(__DIR__) . DS . 'contents' . DS);

class MarkdownWiki
{
    private $slug;
    private $md_path;

    public static function init()
    {
        new MarkdownWiki();
    }

    protected function __construct()
    {
        $this->init_slug();
        $this->show_contents();
    }

    private function init_slug()
    {
        $this->slug = trim(filter_input(INPUT_GET, 'slug'), '/');
        
        if (empty($this->slug)) {
            $this->slug = 'Main';
        }
        
        $this->md_path = ROOT_CONTENTS . $this->slug . '.md';
        if (!file_exists($this->md_path)) {
            header("HTTP/1.0 404 Not Found");
            die;
        }

        if (substr($this->slug, -3) == '.md') {
            header("Location: /w/" . substr($this->slug, 0, -3));
            exit;
        }
    }

    private function show_contents()
    {
        $mdContent = file_get_contents($this->md_path);

        $parser = new \Parsedown();
        $htmlContents = $parser->text($mdContent);

        include dirname(__FILE__) . DS . 'main-template.php';
    }
}
