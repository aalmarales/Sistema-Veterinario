<?php

namespace App\Filament\Resources\TreatmentResource\Pages;

use App\Filament\Resources\TreatmentResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

use Filament\Notifications\Notification;

//use Illuminate\Support\Facades\Auth;

//use Illuminate\Database\Eloquent\Model;

class CreateTreatment extends CreateRecord
{
    protected static string $resource = TreatmentResource::class;

    /* protected function handleRecordCreation(array $data): Model
    {
        $data['user_id'] = Auth::id();
        return static::getModel()->create($data);
    } */

    /* protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = Auth::id();

        return $data;
    } */

    /* protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
        ->success()
        ->title('Treatment Created')
        ->body('The treatment has been created successfully.');
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    } */
}
