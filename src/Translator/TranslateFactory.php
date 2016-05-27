<?php
namespace BobbyFramework\Globalisations\Translator;

use BobbyFramework\Globalisations\Translator\Adapter\Native;

class TranslateFactory
{
    public static function build($key,array $options)
    {
        $class = '\\BobbyFramework\\Globalisations\\Translator\\Adapter\\' . $key;
        if (class_exists($class)) {
            return new $class($options);
        } else {
            #TODO EXCEPTION
        }
    }

    public static function BuildNative($options){
        return new Native($options);
    }
}