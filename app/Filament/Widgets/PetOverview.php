<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

use App\Models\Pet;

use Filament\Support\Enums\IconPosition;

class PetOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $pets = Pet::query()->get();
        
        $create = $pets->map(function(Pet $obj){
            return $obj->created_at->day;
            
        });

        return [
            Stat::make('Total Pets',Pet::count())
                ->icon('heroicon-o-heart')
                ->description('This is the pets count')
                ->descriptionIcon('heroicon-o-chart-bar', IconPosition::Before)
                ->color('warning')
                ->chart($create->all()),
        ];
    }
}
