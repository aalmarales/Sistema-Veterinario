<?php

namespace App\Filament\Resources\OwnerResource\Pages;

use App\Filament\Resources\OwnerResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\Mail;
use App\Mail\PetDetailsMail;
use App\Models\User; 

use Illuminate\Support\Facades\Auth;
use App\Models\Owner; 

class CreateOwner extends CreateRecord
{
    protected static string $resource = OwnerResource::class;


   /*  protected function mutateFormDataBeforeCreate(array $data): array
    {
        return $data;
    } */

    /* protected function handleRecordCreation(array $data): Model
    {
        
        return static::getModel()::create($data);
    } */

    protected function afterCreate(): void
    {   
        $last= Owner::get()->last();
        Mail::to(auth()->user()->email)->send(new PetDetailsMail($last));
    }

     

    protected function getCreatedNotification(): ?Notification
    {
        

        return Notification::make()
            ->success()
            ->title('Owner created')
            ->body('The owner has been created successfully.')
            ->sendToDatabase(auth()->user());

            //Mail::to(User::find(1))->send(new PetDetailsMail('Prueba del email'));

        /* return Notification::make()
            ->success()
            ->title('Owner Created')
            ->body('The owner has been created successfully.');
            //->send(); */
            
        /* return auth()->user()->notify(
            Notification::make()
                ->success()
                ->title('Owner Created')
                ->body('The owner has been saved successfully.')
                ->toDatabase(),
    ); */
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

   
}
