<?php

namespace App\Filament\Resources\PetResource\Pages;

use App\Filament\Resources\PetResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

use Filament\Notifications\Notification;

class CreatePet extends CreateRecord
{
    protected static string $resource = PetResource::class;


    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
        ->success()
        ->title('Pet Created')
        ->body('The pet has been created successfully.');
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
