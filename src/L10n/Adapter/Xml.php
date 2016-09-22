<?php
namespace BobbyFramework\Globalisations\L10n\Adapter;

use BobbyFramework\Globalisations\AbstractAdapter;
use BobbyFramework\Globalisations\AdapterInterface;
use BobbyFramework\Globalisations\L10n\Country;
use BobbyFramework\Globalisations\Manager;

class Xml extends AbstractAdapter implements AdapterInterface
{
    public function run(Manager $languages)
    {
        if (!file_exists($this->_filePath)) {
            #todo exception errro
        }

        $langXml = simplexml_load_file($this->_filePath);

        foreach ($langXml as $lx) {
            $l = new Country();
            foreach ($lx as $lx2) {

                $l->{'set' . ucfirst($lx2->getName())}((string)$lx->{$lx2->getName()});

                if (true === $l->isDefault()) {
                    $languages->setDefault($l);
                    var_dump($l);
                    $languages->setCurrent($l);
                }
            }
            $languages->add($l);
        }

    }
}