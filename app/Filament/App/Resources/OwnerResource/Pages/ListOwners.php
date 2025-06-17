<?php

namespace App\Filament\App\Resources\OwnerResource\Pages;

use App\Filament\App\Resources\OwnerResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

//use App\Filament\Widgets\OwnerOverview;

use App\Filament\App\Widgets\PersonalOwnerOverview;

class ListOwners extends ListRecords
{
    protected static string $resource = OwnerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->button()
                ->icon('heroicon-o-users')
                ->color('primary')
                ->tooltip('Create a new owner'),
        ];
    }

    protected  function getHeaderWidgets(): array
    {
        return [
          PersonalOwnerOverview::class,
        ];
    }

   
}
