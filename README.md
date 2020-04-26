<img src="example/assets/img/logo-wiki.png">

# Markdown Wiki

A Lightweight Wiki using Markdown markup language, file storage and PHP.

This is your best choice to create online guides for applications.

## Main Features
1. Content Pages
2. Sub Folders

### Linking

You can add or not the `.md` extension in the link.

## Installing

1. Run `composer require interart/markdownwiki` (or `composer update` to get latest library version).
2. Copy the `index.php` and `.htaccess` files (from `example` folder) to your root www folder.
3. Edit `index.php` file: 
    * Set path to `vendor/autoload.php`
    * Change the application title (MD_NAME var)
    * Check ROOT_CONTENTS var path and change it, if needed

## Creating Content

Just create a file named with `.md` extension, insert its contents and save it under `contents` folder.

Then, link it from any page.

## Dependencies

* PHP 7.x
* <a href="https://github.com/erusev/parsedown" target="_blank">Parsedown</a> 1.7 (Markdown parser in PHP)

## Roadmap

* Create web interface to create and edit contents

<hr>

&copy;2020 [Interart Tecnologia](https://www.interart.com)
