<?php

namespace BobbyFramework\Globalisations;

/**
 * Interface GlobalisationsInterface
 *
 * @package BobbyFramework\Globalisations
 */
interface GlobalisationsInterface
{
    /**
     *
     */
    const STATUS_ENABLED = true;
    /**
     *
     */
    const STATUS_DISABLED = false;

    /**
     * @param $id
     */
    public function setId($id);

    /**
     * @return boolean
     */
    public function isDefault();
}