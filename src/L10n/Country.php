<?php

namespace BobbyFramework\Globalisations\L10n;

use BobbyFramework\Globalisations\GlobalisationsInterface;

/**
 * Class Country
 *
 * @package BobbyFramework\Globalisations\L10n
 */
class Country implements GlobalisationsInterface
{
    /**
     * @var
     */
    protected $name;

    /**
     * @var
     */
    protected $id;

    /**
     * @param $val
     *
     * @return int|void
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
     * @param bool $defaultValue
     *
     * @return bool
     */
    public function isDefault($defaultValue = false)
    {
        return isset($this->isDefault) ? $this->isDefault : $defaultValue;
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
    public function setIsDefault($val)
    {
        $this->isDefault = $val;
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
}
