<?php

namespace App\Filament\Resources\VillaResource\Pages;

use App\Filament\Resources\VillaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListVillas extends ListRecords
{
    protected static string $resource = VillaResource::class;

    protected function getHeaderActions(): array
    {
        return [
        ];
    }
}
