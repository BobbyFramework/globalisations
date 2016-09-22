<?php
namespace BobbyFramework\Globalisations\L10n;

class CountriesFactory
{
    public static function build($key, $options = null)
    {
        $class = '\\BobbyFramework\\Globalisations\\L10n\\Adapter\\' . $key;
        if (class_exists($class)) {

            $obj = new $class();
            if (false === is_null($options)) {
                #todo using hydrator bobby Framework
                foreach ($options as $key => $value) {
                    $method = 'set' . ucfirst($key);
                    $obj->$method($value);
                }
            }
            return $obj;
        } else {
            #TODO EXCEPTION
        }
    }
}