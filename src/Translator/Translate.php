<?php

namespace BobbyFramework\Globalisations\Translator;

/**
 * Class Translate
 *
 * @package BobbyFramework\Globalisations\Translator
 */
class Translate
{
    /**
     * @var AdapterInterface
     */
    protected $_adapter;

    /**
     * Translate constructor.
     *
     * @param AdapterInterface $adapterInterface
     */
    public function __construct(AdapterInterface $adapterInterface)
    {
        $this->_adapter = $adapterInterface;

        $this->_adapter->run();
    }

    /**
     * @param        $key
     * @param string $groupName
     *
     * @return mixed
     */
    public function query($key, $groupName = 'default')
    {
        return $this->_adapter->query($key, $groupName);
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        return $this->_adapter->getAll();
    }
}