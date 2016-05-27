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
            $this->_filesPath[] = $filePath;
        }
    }

    /**
     * @param $key
     * @return mixed
     */
    public function query($key)
    {
        return $this->_translate[$key];
    }

    /**
     * @param $file
     * @throws \Exception
     */
    private function getFileLang($file)
    {
        // echo $file ;
        if (file_exists($file)) {
            $handle = fopen($file, "r");
            if ($handle) {
                while (!feof($handle)) {
                    $buffer = fgets($handle, 4096);
                    if ((substr($buffer, 0, 1) == "\n") || (!substr($buffer, 0, 1))) {
                        continue;
                    }
                    $buffer = trim($buffer);
                    if (!empty($buffer)) {
                        list($key, $value) = preg_split("/ = /", trim($buffer));
                        $this->_translate[$key] = substr($value, 0);
                    }
                }
            }
        }

        
    }

    /**
     * @return $this
     */
    public function run()
    {
        foreach ($this->_filesPath as $filePath) {
            if (file_exists($filePath)) {
                $this->getFileLang($filePath);
            }
        }
        return $this;

    }
}