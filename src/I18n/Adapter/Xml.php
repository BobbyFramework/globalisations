<?php

namespace BobbyFramework\Globalisations\I18n\Adapter;

use BobbyFramework\Globalisations\AbstractAdapter;
use BobbyFramework\Globalisations\AdapterInterface;
use BobbyFramework\Globalisations\I18n\Language;
use BobbyFramework\Globalisations\Manager;

/**
 * Class Xml
 *
 * @package BobbyFramework\Globalisations\I18n\Adapter
 */
class Xml extends AbstractAdapter implements AdapterInterface
{
    /**
     * @var
     */
    protected $_filePath;

    /**
     * @param Manager $languages
     *
     * @return mixed|void
     */
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

                if ($l->isDefault() === '1') {
                    $languages->setDefault($l);
                    $languages->setCurrent($l);
                }
            }
            $languages->add($l);
        }
    }
}
