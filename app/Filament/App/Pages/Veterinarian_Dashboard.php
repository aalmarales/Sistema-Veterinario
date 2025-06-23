<?php

namespace App\Filament\App\Pages;

use Filament\Pages\Page;

use App\Filament\App\Widgets\PersonalOwnerChart;
use App\Filament\App\Widgets\PersonalPetChart;
use App\Filament\App\Widgets\PersonalTreatmentChart;

class Veterinarian_Dashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-home-modern';

    protected static string $view = 'filament.app.pages.veterinarian_-dashboard';

    protected static ?string $title = 'My Dashboard';

     protected function getHeaderWidgets(): array
    {
        return [
            
            PersonalOwnerChart::class,
            PersonalPetChart::class,
            PersonalTreatmentChart::class,
            
        ];
    }
}
