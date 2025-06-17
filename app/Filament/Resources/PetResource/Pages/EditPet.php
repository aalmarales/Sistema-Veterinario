<?php

namespace App\Filament\Resources\PetResource\Pages;

use App\Filament\Resources\PetResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

use App\Models\Treatment;

class EditPet extends EditRecord
{
    protected static string $resource = PetResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    /* protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['user_id'] = Auth::id();

        return $data;
    } */

    /* protected function handleRecordUpdate(Model $record, array $data): Model
    {
        $record->treatments()->each(function (Treatment $treatment) {
            $treatment->user()->update([$data['user_id'] => Auth::id()]);
        });

        $record->update($data);

        return $record;
    } */


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
