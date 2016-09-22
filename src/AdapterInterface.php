<?php
namespace BobbyFramework\Globalisations;

interface AdapterInterface
{
    public function run(Manager $manager);

    public function setFilePath($path);
}