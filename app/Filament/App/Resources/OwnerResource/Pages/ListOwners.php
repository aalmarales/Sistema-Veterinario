<?php

namespace App\Filament\App\Resources\OwnerResource\Pages;

use App\Filament\App\Resources\OwnerResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

use App\Filament\Widgets\OwnerOverview;

class ListOwners extends ListRecords
{
    protected static string $resource = OwnerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected  function getHeaderWidgets(): array
    {
        return [
           //OwnerOverview::class,
        ];
    }
}
