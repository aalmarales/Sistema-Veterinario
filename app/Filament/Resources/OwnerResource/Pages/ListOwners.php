<?php

namespace App\Filament\Resources\OwnerResource\Pages;

use App\Filament\Resources\OwnerResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

use App\Filament\Widgets\OwnerOverview;
use Filament\Actions\Action;

class ListOwners extends ListRecords
{
    protected static string $resource = OwnerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->button()
                ->icon('heroicon-o-users')
                ->color('warning')
                ->tooltip('Create a new owner'),

            Action::make('send google')
                ->url('https://google.com'),
        ];
    }

    protected  function getHeaderWidgets(): array
    {
        return [
           OwnerOverview::class,
        ];
    }
}
