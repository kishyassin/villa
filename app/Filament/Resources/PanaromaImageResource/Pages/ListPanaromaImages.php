<?php

namespace App\Filament\Resources\PanaromaImageResource\Pages;

use App\Filament\Resources\PanaromaImageResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPanaromaImages extends ListRecords
{
    protected static string $resource = PanaromaImageResource::class;

    protected function getHeaderActions(): array
    {
        return [
        ];
    }
}
