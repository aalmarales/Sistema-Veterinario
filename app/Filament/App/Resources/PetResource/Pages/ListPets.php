<?php

namespace App\Filament\App\Resources\PetResource\Pages;

use App\Filament\App\Resources\PetResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

use App\Filament\App\Widgets\PersonalPetOverview;

class ListPets extends ListRecords
{
    protected static string $resource = PetResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->button()
                ->icon('heroicon-o-heart')
                ->color('primary')
                ->tooltip('Create a new pet'),
        ];
    }

    protected  function getHeaderWidgets(): array
    {
        return [
           PersonalPetOverview::class,
        ];
    }
}
