<?php

namespace App\Filament\App\Resources\PetResource\Pages;

use App\Filament\App\Resources\PetResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

use Filament\Notifications\Notification;

class EditPet extends EditRecord
{
    protected static string $resource = PetResource::class;

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

    protected function getSavedNotification(): ?Notification
    {
            return Notification::make()
                ->success()
                ->title('Pet updated')
                ->body('The pet has been updated successfully.')
                ->sendToDatabase(auth()->user());
    }

}
