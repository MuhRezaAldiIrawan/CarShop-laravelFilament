<?php

namespace App\Filament\Resources\TipeModelResource\Pages;

use App\Filament\Resources\TipeModelResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTipeModel extends EditRecord
{
    protected static string $resource = TipeModelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
