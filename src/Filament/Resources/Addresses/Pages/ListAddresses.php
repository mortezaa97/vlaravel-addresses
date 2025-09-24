<?php

namespace Mortezaa97\Addresses\Filament\Resources\Addresses\Pages;

use Mortezaa97\Addresses\Filament\Resources\Addresses\AddressResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

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
