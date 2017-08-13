<?php

namespace BobbyFramework\Globalisations\Translator;

use BobbyFramework\Globalisations\Translator\Adapter\Native;

/**
 * Class TranslateFactory
 *
 * @package BobbyFramework\Globalisations\Translator
 */
class TranslateFactory
{
    /**
     * @param       $key
     * @param array $options
     *
     * @return mixed
     */
    public static function build($key, array $options)
    {
        $class = '\\BobbyFramework\\Globalisations\\Translator\\Adapter\\' . $key;
        if (class_exists($class)) {
            return new $class($options);
        } else {
            #TODO EXCEPTION
        }
    }

    /**
     * @param $options
     *
     * @return Native
     */
    public static function BuildNative($options)
    {
        return new Native($options);
    }
}