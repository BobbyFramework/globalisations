<?php
namespace BobbyFramework\Globalisations\Translator;

interface AdapterInterface
{
    public function query($key);

    public function run();
}