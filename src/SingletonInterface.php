<?php

namespace Tailors\Lib\Singleton;

/**
 * A singleton interface.
 *
 * @author Paweł Tomulik <pawel@tomulik.pl>
 */
interface SingletonInterface
{
    /**
     * Returns the single instance.
     */
    public static function getInstance(): mixed;
}

// vim: syntax=php sw=4 ts=4 et:
