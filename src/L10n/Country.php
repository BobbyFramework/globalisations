<?php

namespace BobbyFramework\Globalisations\L10n;

use BobbyFramework\Globalisations\GlobalisationsInterface;

class Country implements GlobalisationsInterface
{
    public function setId($val)
    {
        $this->id = (int)$val;
    }

    public function isDefault($defaultValue = false)
    {
        return isset($this->isDefault) ? $this->isDefault : $defaultValue;
    }
}