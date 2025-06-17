<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

use App\Models\Treatment;

use Filament\Support\Enums\IconPosition;

class TreatmentOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $treatment = Treatment::query()->get();
        
        $create = $treatment->map(function(Treatment $obj){
            return $obj->created_at->day;
            
        });

        return [
            Stat::make('Total Treatments',Treatment::count())
                ->icon('heroicon-o-beaker')
                ->description('This is the treatments count')
                ->descriptionIcon('heroicon-o-chart-bar', IconPosition::Before)
                ->color('warning')
                ->chart($create->all()),
        ];
    }
}
