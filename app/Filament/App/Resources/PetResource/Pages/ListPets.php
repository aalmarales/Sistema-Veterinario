<?php

namespace App\Filament\App\Resources\PetResource\Pages;

use App\Filament\App\Resources\PetResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

use App\Filament\Widgets\PetOverview;

class ListPets extends ListRecords
{
    protected static string $resource = PetResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected  function getHeaderWidgets(): array
    {
        return [
           //PetOverview::class,
        ];
    }
}
