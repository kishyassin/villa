<?php

namespace App\Filament\Resources\VillaHeroImageResource\Pages;

use App\Filament\Resources\VillaHeroImageResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListVillaHeroImages extends ListRecords
{
    protected static string $resource = VillaHeroImageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
