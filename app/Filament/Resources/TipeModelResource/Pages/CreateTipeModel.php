<?php

namespace App\Filament\Resources\TipeModelResource\Pages;

use App\Filament\Resources\TipeModelResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Notification;

class CreateTipeModel extends CreateRecord
{
    protected static string $resource = TipeModelResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotification(): ?Notification
{
    return Notification::make()
        ->success()
        ->title('Tipe Model')
        ->body('Tipe Model telah berhasil terbuat');
}
}
