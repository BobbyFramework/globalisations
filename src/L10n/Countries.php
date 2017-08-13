<?php

namespace BobbyFramework\Globalisations\L10n;

use BobbyFramework\Globalisations\AdapterInterface;
use BobbyFramework\Globalisations\Manager;

/**
 * Class Countries
 *
 * @package BobbyFramework\Globalisations\L10n
 */
class Countries extends Manager
{
    /**
     * Countries constructor.
     *
     * @param AdapterInterface $adapterInterface
     */
    public function __construct(AdapterInterface $adapterInterface)
    {
        parent::__construct($adapterInterface);
    }
}
