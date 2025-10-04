<?php

declare(strict_types=1);

namespace Mortezaa97\Addresses\Filament\Resources\Addresses\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Mortezaa97\Addresses\Filament\Resources\Addresses\AddressResource;

class ListAddresses extends ListRecords
{
    protected static string $resource = AddressResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
