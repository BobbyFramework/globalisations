<?php

define('APP_PATH',realpath('../../..'));

require APP_PATH . '/vendor/autoload.php';

use BobbyFramework\Globalisations\I18n\Languages;
use BobbyFramework\Globalisations\I18n\LanguagesFactory ;

$adapter = LanguagesFactory::build('xml', [
    'filePath' => 'langs.xml'
]);

$languages = new Languages($adapter);

dump($languages->getAll());
dump($languages->getCurrent());
dump($languages->getDefault());

