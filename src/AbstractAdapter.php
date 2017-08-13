<?php

namespace BobbyFramework\Globalisations;

/**
 * Class AbstractAdapter
 *
 * @package BobbyFramework\Globalisations
 */
abstract class AbstractAdapter
{
    /**
     * @var
     */
    protected $_filePath;

    /**
     * AbstractAdapter constructor.
     *
     * @param string $filePath
     */
    public function __construct($filePath = '')
    {
        $this->setFilePath($filePath);
    }

    /**
     * @param $filePath
     */
    public function setFilePath($filePath)
    {
        $this->_filePath = $filePath;
    }
}