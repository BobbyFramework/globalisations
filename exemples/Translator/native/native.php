<?php

define('APP_PATH',realpath('../../..'));

require APP_PATH . '/vendor/autoload.php';

use BobbyFramework\Globalisations\Translator\Translate;
use BobbyFramework\Globalisations\Translator\TranslateFactory;

$translate = new Translate(TranslateFactory::BuildNative(array(
    'filePath' => 'translate.lng'
)));

print_r($translate->query('helloWorl'));
