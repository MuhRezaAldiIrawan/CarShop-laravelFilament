<?php

namespace App\Filament\Resources\TipeModelResource\Pages;

use App\Filament\Resources\TipeModelResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTipeModels extends ListRecords
{
    protected static string $resource = TipeModelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
