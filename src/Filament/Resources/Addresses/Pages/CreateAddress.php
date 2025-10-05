<?php

declare(strict_types=1);

namespace Mortezaa97\Addresses\Filament\Resources\Addresses\Pages;

use Filament\Resources\Pages\CreateRecord;
use Mortezaa97\Addresses\Filament\Resources\Addresses\AddressResource;

class CreateAddress extends CreateRecord
{
    protected static string $resource = AddressResource::class;
}
