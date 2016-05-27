<?php
namespace BobbyFramework\Globalisations\Translator\Adapter;

use BobbyFramework\Globalisations\Translator\AdapterInterface;
use BobbyFramework\Globalisations\Translator\Adapter;

class Native extends Adapter implements AdapterInterface
{
    protected $_translate;

    public function query($key)
    {
        return $this->_translate[$key];
    }

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
        } else {
            die('bug');
        }
    }

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