<?php

namespace BobbyFramework\Globalisations\L10n;

use BobbyFramework\Globalisations\GlobalisationsInterface;

class Country implements GlobalisationsInterface
{
    protected $name;
    protected $id;

    public function setId($val)
    {
        $this->id = (int)$val;
    }

    public function setName($val)
    {
        $this->name = $val;
    }

    public function isDefault($defaultValue = false)
    {
        return isset($this->isDefault) ? $this->isDefault : $defaultValue;
    }

    public function setActive($val)
    {
        $this->active = $val;
    }

    public function setIsDefault($val)
    {
        $this->isDefault = $val;
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
}