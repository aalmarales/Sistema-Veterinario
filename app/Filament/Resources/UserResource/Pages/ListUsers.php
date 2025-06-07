<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

use App\Filament\Widgets\UserOverview;

class ListUsers extends ListRecords
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
            ->button()
            ->icon('heroicon-o-eye-dropper')
            ->color('warning')
            ->tooltip('Create a new veterinarian'),
        ];
    }

    protected  function getHeaderWidgets(): array
    {
        return [
           UserOverview::class,
        ];
    }
}
