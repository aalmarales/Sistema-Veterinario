<?php

namespace App\Filament\Resources\OwnerResource\Pages;

use App\Filament\Resources\OwnerResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

use App\Filament\Widgets\OwnerOverview;


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
                ->tooltip('Create a new owner')
                //->iconButton(),

            /* Actions\Action::make('send google')
                ->url('https://google.com')
                ->icon('heroicon-o-globe-alt')
                ->iconButton(), */
        ];
    }

    protected  function getHeaderWidgets(): array
    {
        return [
           OwnerOverview::class,
        ];
    }
}
