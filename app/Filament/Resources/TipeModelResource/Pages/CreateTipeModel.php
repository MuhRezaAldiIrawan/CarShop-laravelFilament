<?php

namespace App\Filament\Resources\TipeModelResource\Pages;

use App\Filament\Resources\TipeModelResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTipeModel extends CreateRecord
{
    protected static string $resource = TipeModelResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
