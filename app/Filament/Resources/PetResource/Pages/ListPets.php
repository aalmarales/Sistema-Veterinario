<?php

namespace App\Filament\Resources\PetResource\Pages;

use App\Filament\Resources\PetResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

use App\Filament\Widgets\PetOverview;

class ListPets extends ListRecords
{
    protected static string $resource = PetResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->button()
                ->icon('heroicon-o-heart')
                ->color('warning')
                ->tooltip('Create a new pet'),
        ];
    }

     protected  function getHeaderWidgets(): array
    {
        return [
           PetOverview::class,
        ];
    }
}
