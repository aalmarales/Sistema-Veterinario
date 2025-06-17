<?php

namespace App\Filament\App\Resources\OwnerResource\Pages;

use App\Filament\App\Resources\OwnerResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

use Filament\Notifications\Notification;

class CreateOwner extends CreateRecord
{
    protected static string $resource = OwnerResource::class;

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Owner created')
            ->body('The owner has been created successfully.')
            
            ->sendToDatabase(auth()->user());
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
