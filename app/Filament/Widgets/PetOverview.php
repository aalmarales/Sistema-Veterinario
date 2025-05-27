<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

use App\Models\Pet;

class PetOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Pets',Pet::count())->icon('heroicon-o-heart'),
        ];
    }
}
