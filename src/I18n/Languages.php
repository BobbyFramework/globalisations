<?php

namespace BobbyFramework\Globalisations\I18n;

use BobbyFramework\Globalisations\AdapterInterface;
use BobbyFramework\Globalisations\Manager;

/**
 * Class Languages
 *
 * @package BobbyFramework\Globalisations\I18n
 */
class Languages extends Manager
{
    /**
     * Languages constructor.
     *
     * @param AdapterInterface $adapterInterface
     */
    public function __construct(AdapterInterface $adapterInterface)
    {
        parent::__construct($adapterInterface);
    }
}
