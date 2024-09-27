<?php

namespace App\Filament\Resources\KatalogMobilResource\Pages;

use App\Filament\Resources\KatalogMobilResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKatalogMobil extends EditRecord
{
    protected static string $resource = KatalogMobilResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
