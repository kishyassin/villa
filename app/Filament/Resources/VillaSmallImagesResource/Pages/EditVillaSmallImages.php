<?php

namespace App\Filament\Resources\VillaSmallImagesResource\Pages;

use App\Filament\Resources\VillaSmallImagesResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditVillaSmallImages extends EditRecord
{
    protected static string $resource = VillaSmallImagesResource::class;

    protected function getHeaderActions(): array
    {
        return [
        ];
    }
}
