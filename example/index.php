<?php

require '../vendor/autoload.php';

define('MD_NAME', 'Markdown Wiki - User Guide');

define('DS', DIRECTORY_SEPARATOR);
define('ROOT_CONTENTS', dirname(dirname(__DIR__)) . DS . 'contents' . DS);

\Interart\MarkdownWiki\MarkdownWiki::init(ROOT_CONTENTS);
