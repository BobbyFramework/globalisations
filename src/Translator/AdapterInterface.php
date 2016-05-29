<?php
namespace BobbyFramework\Globalisations\Translator;

interface AdapterInterface
{
    public function query($key, $groupName = 'default');

    public function getAll();

    public function run();
}