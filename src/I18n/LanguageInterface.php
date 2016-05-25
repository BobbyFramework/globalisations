<?php
namespace BobbyFramework\Globalisations\I18n;
/**
 * Created by PhpStorm.
 * User: schosnipe
 * Date: 27/04/2016
 * Time: 12:38
 */
interface LanguageInterface
{
    const STATUS_ENABLED = 1;
    const STATUS_DISABLED = 0;

    public function setId($id);

}