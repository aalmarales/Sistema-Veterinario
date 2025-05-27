<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

use App\Filament\Widgets\ControlUsersTable; // Assuming you have a ControlUsersTable widget

class ControlUsers extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-bug-ant';

    protected static string $view = 'filament.pages.control-users';

    

    public static function canAccess(): bool
    {
        return auth()->user()->email=='admin@admin.cu'; 
    }

    protected function getHeaderWidgets(): array
    {
        return [
            ControlUsersTable::class,
        ];
    }
}
