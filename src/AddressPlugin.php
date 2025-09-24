<?php

declare(strict_types=1);

namespace Mortezaa97\Shop;

use Filament\Contracts\Plugin;
use Filament\Panel;
use Mortezaa97\Addresses\Filament\Resources\Addresses\AddressResource;

class AddressPlugin implements Plugin
{
    public static function make(): static
    {
        return app(static::class);
    }

    public function getId(): string
    {
        return 'address';
    }

    public function register(Panel $panel): void
    {
        $panel
            ->resources([
                'AddressResource' => AddressResource::class,
            ]);
    }

    public function boot(Panel $panel): void
    {
        //
    }
}
