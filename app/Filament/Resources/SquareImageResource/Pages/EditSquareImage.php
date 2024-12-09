<?php

namespace App\Filament\Resources\SquareImageResource\Pages;

use App\Filament\Resources\SquareImageResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSquareImage extends EditRecord
{
    protected static string $resource = SquareImageResource::class;

    protected function getHeaderActions(): array
    {
        return [
        ];
    }
}
