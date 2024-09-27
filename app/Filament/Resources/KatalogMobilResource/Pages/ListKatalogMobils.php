<?php

namespace App\Filament\Resources\KatalogMobilResource\Pages;

use App\Filament\Resources\KatalogMobilResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKatalogMobils extends ListRecords
{
    protected static string $resource = KatalogMobilResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
