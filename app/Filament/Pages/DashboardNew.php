<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

use App\Filament\Widgets\OwnerChart;
use App\Filament\Widgets\PetChart;
use App\Filament\Widgets\TreatmentChart;
use App\Filament\Widgets\UserChart;




class DashboardNew extends Page                 //\Filament\Pages\Dashboard
{
    protected static ?string $navigationIcon = 'heroicon-o-home-modern';

    protected static string $view = 'filament.pages.dashboard-new';

    protected static ?string $title = 'My Dashboard';

    //protected int | string | array $columnSpan = 1;

        public function getColumns(): int | string | array
    {
        return 3;
    }

    protected function getHeaderWidgets(): array
    {
        return [
            //OwnerOverview::class,
            //PetOverview::class,
            //TreatmentOverview::class,
            //VeterinariantOverview::class,
            OwnerChart::class,
            PetChart::class,
            TreatmentChart::class,
            UserChart::class,
           

        ];
    }
   
   
}
