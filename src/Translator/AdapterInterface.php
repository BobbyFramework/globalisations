<?php

namespace BobbyFramework\Globalisations\Translator;

/**
 * Interface AdapterInterface
 *
 * @package BobbyFramework\Globalisations\Translator
 */
interface AdapterInterface
{
    /**
     * @param        $key
     * @param string $groupName
     *
     * @return mixed
     */
    public function query($key, $groupName = 'default');

    /**
     * @return mixed
     */
    public function getAll();

    /**
     * @return mixed
     */
    public function run();
}