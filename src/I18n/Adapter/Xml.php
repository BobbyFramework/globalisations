<?php
namespace BobbyFramework\Globalisations\I18n\Adapter;

use BobbyFramework\Globalisations\I18n\Adapter;
use BobbyFramework\Globalisations\I18n\AdapterInterface;
use BobbyFramework\Globalisations\I18n\LanguageEntity;

class Xml extends Adapter implements AdapterInterface
{
    protected $_filePath;

    public function __construct($filePath = '')
    {
        parent::__construct();

        $this->setFilePath($filePath);
    }

    public function setFilePath($filePath)
    {
        $this->_filePath = $filePath;
    }

    public function run()
    {
        if (!file_exists($this->_filePath)) {
            #todo exception errro
        }

        $langXml = simplexml_load_file($this->_filePath);

        foreach ($langXml as $lx) {
            $l = new LanguageEntity();
            foreach ($lx as $lx2) {
                $l->{'set' . ucfirst($lx2->getName())}((string)$lx->{$lx2->getName()});
            }
            $this->add($l);
        }
    }
}