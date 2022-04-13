<?php

namespace Interart\MarkdownWiki;

use Exception;

if (!defined('DS')) {
    define('DS', DIRECTORY_SEPARATOR);
}

class MarkdownWiki
{
    private $slug;
    private $web_path;
    private $md_path;
    private $content_path;
    private $template;

    public static function init($contentPath, $template = null, $webPath = '/w')
    {
        new MarkdownWiki($contentPath, $template, $webPath);
    }

    protected function __construct($contentPath, $template, $webPath)
    {
        $this->content_path = $contentPath;
        $this->web_path = $webPath;
        $this->template = $template ?? dirname(__FILE__) . DS . 'default-template.php';
        if (!file_exists($this->template)) {
            throw new \Exception("Template file not found.");
        }

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
            header("Location: " . $this->web_path . "/" . substr($this->slug, 0, -3));
            exit;
        }
    }

    private function show_contents()
    {
        $mdContent = file_get_contents($this->md_path);

        $parser = new \Parsedown();
        $wikiContents = $parser->text($mdContent);

        include $this->template;
    }
}
