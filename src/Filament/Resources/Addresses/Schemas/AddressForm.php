<?php

declare(strict_types=1);

namespace Mortezaa97\Addresses\Filament\Resources\Addresses\Schemas;

use App\Models\Address;
use Filament\Schemas\Schema;

class AddressForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            \Filament\Schemas\Components\Group::make()
                ->schema([
                    \Filament\Schemas\Components\Section::make()
                        ->schema([
                            \App\Filament\Components\Form\FirstNameTextInput::create(),
                            \App\Filament\Components\Form\LastNameTextInput::create(),
                            \App\Filament\Components\Form\CountySelect::create()->required(),
                            \App\Filament\Components\Form\TitleTextInput::create()->required(),
                            \App\Filament\Components\Form\AddressTextInput::create()->required(),
                            \App\Filament\Components\Form\PhoneTextInput::create()->required(),
                            \App\Filament\Components\Form\PostalCodeTextInput::create(),
                            \App\Filament\Components\Form\LongitudeTextInput::create(),
                            \App\Filament\Components\Form\LatitudeTextInput::create(),
                        ])
                        ->columns(12)
                        ->columnSpan(12),
                ])
                ->columns(12)
                ->columnSpan(8),
            \Filament\Schemas\Components\Group::make()
                ->schema([
                    \Filament\Schemas\Components\Section::make()
                        ->schema([
                            \App\Filament\Components\Form\StatusSelect::create(Address::class),
                            \App\Filament\Components\Form\CreatedBySelect::create()->required(),
                            \App\Filament\Components\Form\UpdatedBySelect::create(),
                        ])
                        ->columns(12)
                        ->columnSpan(12),
                ])
                ->columns(12)
                ->columnSpan(4),
        ])
            ->columns(12);
    }
}
