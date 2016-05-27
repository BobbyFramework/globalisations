<?php
/**
 *
 * Created by PhpStorm.
 * User: schosnipe
 * Date: 27/04/2016
 * Time: 13:57
 */
namespace BobbyFramework\Globalisations\Translator;

/**
 * Class Adapter
 * @package BobbyFramework\Globalisations\Translator
 */
abstract class Adapter
{
    /**
     * @var array
     */
    protected $_options = array();

    /**
     * @var array
     */
    protected $_filesPath = [];

    /**
     * Adapter constructor.
     * @param $options
     */
    public function __construct(array $options)
    {
        $this->setOptions($options);

        if (false === $this->hasOption('files')) {
            throw new \Exception("files is required");
        }

        $this->setFiles($this->getOption('files'));

    }

    /**
     * @param $options
     */
    public function setOptions($options)
    {
        $this->_options = $options;
    }

    /**
     * @param $key
     * @return bool
     */
    public function hasOption($key)
    {
        return isset ($this->_options[$key]);
    }

    /**
     * @param $filePath
     */
    public function setFiles($filePath)
    {
        if (true === is_array($filePath)) {
            $this->_filesPath = array_merge($filePath, $this->_filesPath);
        } else {
            $this->_filesPath[] = $filePath;
        }
    }

    /**
     * @param $offset
     * @param null $defaultValue
     * @return null
     */
    public function getOption($offset, $defaultValue = null)
    {
        foreach ($this->_options as $key => $value) {
            if ($offset === $key) {
                return $value;
            }
        }

        return $defaultValue;
    }
}