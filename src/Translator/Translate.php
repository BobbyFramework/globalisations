<?php
namespace BobbyFramework\Globalisations\Translator;

class Translate
{
    protected $_adapter;

    public function __construct(AdapterInterface $adapterInterface)
    {
        $this->_adapter = $adapterInterface;

        $this->_adapter->run();
    }

    public function query($key,$groupName = 'default')
    {
        return $this->_adapter->query($key,$groupName);
    }

    public function getAll()
    {
        return $this->_adapter->getAll();
    }
}