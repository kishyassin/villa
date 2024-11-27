<?php

namespace App\Filament\Resources\ImagesResource\Pages;

use App\Filament\Resources\ImagesResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListImages extends ListRecords
{
    protected static string $resource = ImagesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
