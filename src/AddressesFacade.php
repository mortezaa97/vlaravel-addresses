<?php

declare(strict_types=1);

namespace Mortezaa97\Addresses;

use Illuminate\Support\Facades\Facade;

/**
 * @see Skeleton\SkeletonClass
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
