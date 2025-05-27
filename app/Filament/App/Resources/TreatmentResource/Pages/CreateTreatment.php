<?php

namespace App\Filament\App\Resources\TreatmentResource\Pages;

use App\Filament\App\Resources\TreatmentResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

use Filament\Notifications\Notification;

class CreateTreatment extends CreateRecord
{
    protected static string $resource = TreatmentResource::class;

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
        ->success()
        ->title('Treatment Created')
        ->body('The treatment has been created successfully.');
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
