<?php
namespace BobbyFramework\Globalisations;
/**
 * Interface GlobalisationsInterface
 * @package BobbyFramework\Globalisations
 */
interface GlobalisationsInterface
{
    const STATUS_ENABLED = true;
    const STATUS_DISABLED = false;

    public function setId($id);

    public function isDefault();
}