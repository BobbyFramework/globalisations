<?php
namespace BobbyFramework\Globalisations\I18n;

use BobbyFramework\Globalisations\AdapterInterface;
use BobbyFramework\Globalisations\Manager;

class Languages extends Manager
{
    public function __construct(AdapterInterface $adapterInterface)
    {
        parent::__construct($adapterInterface);
    }
}
