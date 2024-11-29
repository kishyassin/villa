<?php

namespace App\Filament\Resources\VillaPanaromiqueImageResource\Pages;

use App\Filament\Resources\VillaPanaromiqueImageResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListVillaPanaromiqueImages extends ListRecords
{
    protected static string $resource = VillaPanaromiqueImageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
