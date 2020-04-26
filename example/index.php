<?php

require '../vendor/autoload.php';

define('MD_NAME', 'Markdown Wiki - User Guide');
define('DS', DIRECTORY_SEPARATOR);

$contentsFolder = __DIR__ . DS . 'contents' . DS;

// This setting is optional (default: src/default-template.php)
$customTemplatePath = __DIR__ . DS . 'custom-template.php';

\Interart\MarkdownWiki\MarkdownWiki::init($contentsFolder, $customTemplatePath);
