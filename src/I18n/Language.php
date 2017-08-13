<?php

namespace BobbyFramework\Globalisations\I18n;

use BobbyFramework\Globalisations\GlobalisationsInterface;

/**
 * Class Language
 *
 * @package BobbyFramework\Globalisations\I18n
 */
class Language implements GlobalisationsInterface
{
    /**
     * @param $val
     */
    public function setId($val)
    {
        $this->id = (int)$val;
    }

    /**
     * @param $val
     */
    public function setName($val)
    {
        $this->name = $val;
    }

    /**
     * @param $val
     */
    public function setActive($val)
    {
        $this->active = $val;
    }

    /**
     * @param $val
     */
    public function setIsoCode($val)
    {
        $this->isoCode = $val;
    }

    /**
     * @param $val
     */
    public function setLanguageCode($val)
    {
        $this->languageCode = $val;
    }

    /**
     * @param $val
     */
    public function setIsDefault($val)
    {
        $this->isDefault = $val;
    }

    /**
     * @param $val
     */
    public function setFlags($val)
    {
        $this->flags = $val;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * @return mixed
     */
    public function getIsoCode()
    {
        return $this->isoCode;
    }

    /**
     * @return mixed
     */
    public function getLanguageCode()
    {
        return $this->languageCode;
    }

    /**
     * @param bool $defaultValue
     *
     * @return bool
     */
    public function isDefault($defaultValue = false)
    {
        return isset($this->isDefault) ? $this->isDefault : $defaultValue;
    }

    /**
     * @return mixed
     */
    public function getFlags()
    {
        return $this->flags;
    }
}