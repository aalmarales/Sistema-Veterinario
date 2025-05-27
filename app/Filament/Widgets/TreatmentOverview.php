<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

use App\Models\Treatment;

class TreatmentOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Treatments',Treatment::count())->icon('heroicon-o-beaker'),
        ];
    }
}
