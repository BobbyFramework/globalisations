<?php
namespace BobbyFramework\Globalisations\I18n\Adapter;

use BobbyFramework\Globalisations\AdapterInterface;
use BobbyFramework\Globalisations\I18n\Language;
use BobbyFramework\Globalisations\Manager;

class Xml implements AdapterInterface
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

    public function run(Manager $languages)
    {
        if (!file_exists($this->_filePath)) {
            #todo exception errro
        }

        $langXml = simplexml_load_file($this->_filePath);

        foreach ($langXml as $lx) {
            $l = new Language();
            foreach ($lx as $lx2) {

                $l->{'set' . ucfirst($lx2->getName())}((string)$lx->{$lx2->getName()});

                if (true === $l->isDefault()) {
                    $languages->setDefault($l);
                    $languages->setCurrent($l);
                }
            }
            $languages->add($l);
        }

    }
}