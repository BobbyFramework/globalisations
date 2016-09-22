<?php
namespace BobbyFramework\Globalisations;

abstract class AbstractAdapter
{
    protected $_filePath;

    public function __construct($filePath = '')
    {
        $this->setFilePath($filePath);
    }

    public function setFilePath($filePath)
    {
        $this->_filePath = $filePath;
    }
}