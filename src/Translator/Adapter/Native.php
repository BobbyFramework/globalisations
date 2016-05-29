<?php
namespace BobbyFramework\Globalisations\Translator\Adapter;

use BobbyFramework\Globalisations\Translator\AdapterInterface;
use BobbyFramework\Globalisations\Translator\Adapter;

class Native extends Adapter implements AdapterInterface
{
    /**
     * @var
     */
    protected $_translate;

    /**
     * @var array
     */
    protected $_filesPath = [];


    /**
     * Native constructor.
     * @param array $options
     */
    public function __construct(array $options)
    {
        parent::__construct($options);

        if (false === $this->hasOption('files')) {
            throw new \Exception("files is required");
        }

        $this->setFiles($this->getOption('files'));

    }

    /**
     * @param $filePath
     */
    public function setFiles($filePath)
    {
        if (true === is_array($filePath)) {
            $this->_filesPath = array_merge($filePath, $this->_filesPath);
        } else {
            $this->_filesPath['default'] = $filePath;
        }
    }

    /**
     * @param $key
     * @param string $groupName
     * @return mixed
     */
    public function query($key, $groupName = 'default')
    {
        return $this->_translate[$groupName][$key];
    }


    /**
     * @return $this
     */
    public function run()
    {
        foreach ($this->_filesPath as $keyPath => $filePath) {
            if (file_exists($filePath)) {
                $handle = fopen($filePath, "r");
                if ($handle) {
                    while (!feof($handle)) {
                        $buffer = fgets($handle, 4096);
                        if ((substr($buffer, 0, 1) == "\n") || (!substr($buffer, 0, 1))) {
                            continue;
                        }
                        $buffer = trim($buffer);
                        if (!empty($buffer)) {
                            list($key, $value) = preg_split("/ = /", trim($buffer));

                            if ($keyPath === $this->getOption('default')) {
                                $this->_translate['default'][$key] = substr($value, 0);
                            } else {
                                $this->_translate[$keyPath][$key] = substr($value, 0);
                            }


                        }
                    }
                }

            }
        }
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        return $this->_translate;
    }
}