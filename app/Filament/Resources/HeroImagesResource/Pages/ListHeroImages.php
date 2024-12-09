<?php

namespace App\Filament\Resources\HeroImagesResource\Pages;

use App\Filament\Resources\HeroImagesResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHeroImages extends ListRecords
{
    protected static string $resource = HeroImagesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
