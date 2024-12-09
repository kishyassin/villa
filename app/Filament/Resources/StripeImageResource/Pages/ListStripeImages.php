<?php

namespace App\Filament\Resources\StripeImageResource\Pages;

use App\Filament\Resources\StripeImageResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListStripeImages extends ListRecords
{
    protected static string $resource = StripeImageResource::class;

    protected function getHeaderActions(): array
    {
        return [
        ];
    }
}
