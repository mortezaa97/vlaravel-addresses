<?php

declare(strict_types=1);

namespace Mortezaa97\Addresses\Filament\Resources\Addresses;

use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Mortezaa97\Addresses\Filament\Resources\Addresses\Pages\CreateAddress;
use Mortezaa97\Addresses\Filament\Resources\Addresses\Pages\EditAddress;
use Mortezaa97\Addresses\Filament\Resources\Addresses\Pages\ListAddresses;
use Mortezaa97\Addresses\Filament\Resources\Addresses\Schemas\AddressForm;
use Mortezaa97\Addresses\Filament\Resources\Addresses\Tables\AddressesTable;
use Mortezaa97\Addresses\Models\Address;
use UnitEnum;

class AddressResource extends Resource
{
    protected static ?string $model = Address::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'آدرس';

    protected static ?string $navigationLabel = 'آدرس‌ها';

    protected static ?string $modelLabel = 'آدرس';

    protected static ?string $pluralModelLabel = 'آدرس‌ها';

    protected static string|null|UnitEnum $navigationGroup = 'کاربران';

    public static function form(Schema $schema): Schema
    {
        return AddressForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AddressesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListAddresses::route('/'),
            'create' => CreateAddress::route('/create'),
            'edit' => EditAddress::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
