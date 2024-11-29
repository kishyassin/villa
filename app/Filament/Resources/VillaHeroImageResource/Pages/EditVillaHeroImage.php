<?php

namespace App\Filament\Resources\VillaHeroImageResource\Pages;

use App\Filament\Resources\VillaHeroImageResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditVillaHeroImage extends EditRecord
{
    protected static string $resource = VillaHeroImageResource::class;

    protected function getHeaderActions(): array
    {
        return [
        ];
    }
}
