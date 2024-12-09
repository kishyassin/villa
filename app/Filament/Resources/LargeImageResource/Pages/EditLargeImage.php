<?php

namespace App\Filament\Resources\LargeImageResource\Pages;

use App\Filament\Resources\LargeImageResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLargeImage extends EditRecord
{
    protected static string $resource = LargeImageResource::class;

    protected function getHeaderActions(): array
    {
        return [
        ];
    }
}
