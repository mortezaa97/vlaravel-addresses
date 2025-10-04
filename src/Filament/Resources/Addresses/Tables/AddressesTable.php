<?php

declare(strict_types=1);

namespace Mortezaa97\Addresses\Filament\Resources\Addresses\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;
use Mortezaa97\Addresses\Models\Address;

class AddressesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                \Filament\Tables\Columns\TextColumn::make('county.name')->searchable(),
                \App\Filament\Components\Table\TitleTextColumn::create(),
                \App\Filament\Components\Table\AddressTextColumn::create(),
                \App\Filament\Components\Table\PhoneTextColumn::create(),
                \App\Filament\Components\Table\PostalCodeTextColumn::create(),
                \App\Filament\Components\Table\LongitudeTextColumn::create(),
                \App\Filament\Components\Table\LatitudeTextColumn::create(),
                \App\Filament\Components\Table\StatusTextColumn::create(Address::class),
                \App\Filament\Components\Table\FirstNameTextColumn::create(),
                \App\Filament\Components\Table\LastNameTextColumn::create(),
                \App\Filament\Components\Table\CreatedByTextColumn::create(),
                \App\Filament\Components\Table\UpdatedByTextColumn::create(),
                \App\Filament\Components\Table\DeletedAtTextColumn::create(),
                \App\Filament\Components\Table\CreatedAtTextColumn::create(),
                \App\Filament\Components\Table\UpdatedAtTextColumn::create(),
            ])
            ->filters([
                TrashedFilter::make(),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                ]),
            ]);
    }
}
