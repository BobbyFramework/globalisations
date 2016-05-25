<?php
namespace BobbyFramework\Globalisations\I18n;

class LanguagesFactory
{
    public static function build($key,$options = null)
    {
        $class = '\\BobbyFramework\\Globalisations\\I18n\\Adapter\\' . $key;
        if (class_exists($class)) {

            $obj = new $class();
            if(false === is_null($options)){
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