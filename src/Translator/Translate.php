<?php
namespace BobbyFramework\Globalisations\Translator;

class Translate
{
    private $_adapter;

    public function __construct(AdapterInterface $adapterInterface)
    {
        $this->_adapter = $adapterInterface;

        $this->_adapter->run();
    }

    public function query($key)
    {
        return $this->_adapter->query($key);
    }
}