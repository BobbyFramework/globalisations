<?php

define('APP_PATH',realpath('../../..'));

require APP_PATH . '/vendor/autoload.php';

use BobbyFramework\Globalisations\Translator\Translate;
use BobbyFramework\Globalisations\Translator\TranslateFactory;

// One file languages
$adapter = TranslateFactory::BuildNative([
    'files' => 'translate.lng'
]);

$translate = new Translate($adapter);

dump($translate->query('hello'));

// Multiple file language
$adapter = TranslateFactory::BuildNative([
    'files' => [
        'default' => 'translate.lng',
        'test' => 'test.lng'
    ]
]);

$translate = new Translate($adapter);

dump($translate->query('hello'));