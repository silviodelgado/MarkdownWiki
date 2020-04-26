<?php

namespace Interart\MarkdownWiki;

if (!defined('DS')) {
    define('DS', DIRECTORY_SEPARATOR);
}

class MarkdownWiki
{
    private $slug;
    private $md_path;
    private $content_path;

    public static function init($contentPath)
    {
        new MarkdownWiki($contentPath);
    }

    protected function __construct($contentPath)
    {
        $this->content_path = $contentPath;
        $this->init_slug();
        $this->show_contents();
    }

    private function init_slug()
    {
        $this->slug = trim(filter_input(INPUT_GET, 'slug'), '/');
        
        if (empty($this->slug)) {
            $this->slug = 'Main';
        }
        
        $this->md_path = $this->content_path . $this->slug . '.md';
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
