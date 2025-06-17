<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

use App\Models\User;

use Filament\Support\Enums\IconPosition;

class UserOverview extends BaseWidget
{
    protected function getStats(): array
    {

        $user = User::query()->get();
        
        $create = $user->map(function(User $obj){
            return $obj->created_at->day;
            
        });

        return [
            Stat::make('Total Veterinarian', User::count())
                ->icon('heroicon-o-eye-dropper')
                ->description('This is the veterinarian count')
                ->descriptionIcon('heroicon-o-chart-bar', IconPosition::Before)
                ->color('warning')
                ->chart($create->all()),
        ];
    }
}
