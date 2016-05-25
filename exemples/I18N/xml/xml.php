<?php

define('APP_PATH',realpath('../../..'));

require APP_PATH . '/vendor/autoload.php';

use BobbyFramework\Globalisations\I18n\Languages;
use BobbyFramework\Globalisations\I18n\LanguagesFactory ;

$languages = new Languages(LanguagesFactory::build('xml',array(
    'filePath' => 'langs.xml'
)));

print_r($languages->getAll());
print_r($languages->getCurrent());
print_r($languages->getDefault());

