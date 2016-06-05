<?php
namespace BobbyFramework\Globalisations\L10n;

use BobbyFramework\Globalisations\AdapterInterface;
use BobbyFramework\Globalisations\Manager;

class Countries extends Manager
{
    public function __construct(AdapterInterface $adapterInterface)
    {
        parent::__construct($adapterInterface);
    }
}
