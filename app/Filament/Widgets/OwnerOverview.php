<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

use App\Models\Owner;

use Filament\Support\Enums\IconPosition;

//use Carbon\Carbon;
//use Illuminate\Database\Eloquent\Builder;

class OwnerOverview extends BaseWidget
{
    protected static ?int $sort = 2;

    //protected ?string $heading = 'Analytics';

    //protected ?string $description = 'An overview of some analytics.';


    
    protected function getStats(): array
    {
        $owners = Owner::query()->get();
        
        $create = $owners->map(function(Owner $obj){
            return $obj->created_at->day;
            
        });
        
        return [
            Stat::make('Total Owner', Owner::count())
                ->icon('heroicon-o-users')
                ->description('This is the owners count')
                ->descriptionIcon('heroicon-o-chart-bar', IconPosition::Before)
                ->color('warning')
                ->chart($create->all())
        ];
    }
}
