<?php

namespace Mortezaa97\Addresses;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Mortezaa97\Addresses\Skeleton\SkeletonClass
 */
class AddressesFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'addresses';
    }
}
