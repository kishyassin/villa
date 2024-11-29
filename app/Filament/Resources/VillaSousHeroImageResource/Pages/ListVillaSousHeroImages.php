<?php

namespace App\Filament\Resources\VillaSousHeroImageResource\Pages;

use App\Filament\Resources\VillaSousHeroImageResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListVillaSousHeroImages extends ListRecords
{
    protected static string $resource = VillaSousHeroImageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
