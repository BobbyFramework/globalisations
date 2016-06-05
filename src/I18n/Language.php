<?php

namespace BobbyFramework\Globalisations\I18n;

use BobbyFramework\Globalisations\GlobalisationsInterface;

class Language implements GlobalisationsInterface
{
    public function setId($val)
    {
        $this->id = (int)$val;
    }

    public function setName($val)
    {
        $this->name = $val;
    }

    public function setActive($val)
    {
        $this->active = $val;
    }

    public function setIsoCode($val)
    {
        $this->isoCode = $val;
    }

    public function setLanguageCode($val)
    {
        $this->languageCode = $val;
    }

    public function setIsDefault($val)
    {
        $this->isDefault = $val;
    }

    public function setFlags($val)
    {
        $this->flags = $val;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getActive()
    {
        return $this->active;
    }

    public function getIsoCode()
    {
        return $this->isoCode;
    }

    public function getLanguageCode()
    {
        return $this->languageCode;
    }

    public function isDefault($defaultValue = false)
    {
        return isset($this->isDefault) ? $this->isDefault : $defaultValue;
    }

    public function getFlags()
    {
        return $this->flags;
    }
}