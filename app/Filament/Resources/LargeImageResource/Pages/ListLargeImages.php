<?php

namespace App\Filament\Resources\LargeImageResource\Pages;

use App\Filament\Resources\LargeImageResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLargeImages extends ListRecords
{
    protected static string $resource = LargeImageResource::class;

    protected function getHeaderActions(): array
    {
        return [
        ];
    }
}
