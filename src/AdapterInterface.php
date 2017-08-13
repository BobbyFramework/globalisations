<?php

namespace BobbyFramework\Globalisations;

/**
 * Interface AdapterInterface
 *
 * @package BobbyFramework\Globalisations
 */
interface AdapterInterface
{
    /**
     * @param Manager $manager
     *
     * @return mixed
     */
    public function run(Manager $manager);

    /**
     * @param $path
     *
     * @return mixed
     */
    public function setFilePath($path);
}