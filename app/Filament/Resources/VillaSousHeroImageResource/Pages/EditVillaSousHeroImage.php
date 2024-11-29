<?php

namespace App\Filament\Resources\VillaSousHeroImageResource\Pages;

use App\Filament\Resources\VillaSousHeroImageResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditVillaSousHeroImage extends EditRecord
{
    protected static string $resource = VillaSousHeroImageResource::class;

    protected function getHeaderActions(): array
    {
        return [
        ];
    }
}
