<?php

namespace App\Filament\App\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

use Filament\Support\Enums\IconPosition;

use App\Models\User;
use App\Models\Owner;

use Illuminate\Database\Eloquent\Builder;

class PersonalOwnerOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('My Owners', $this->getMyOwners(auth()->user()))
                ->icon('heroicon-o-users')
                ->description('This is the Owners count')
                ->descriptionIcon('heroicon-o-chart-bar', IconPosition::Before)
                ->color('warning')
                ->chart([1,5,6,9,12,45]),
        ];
    }

    protected function getMyOwners(User $user)
    {
        $my_owners = Owner::whereHas('pets.treatments', function(Builder $query) use ($user)
        {
            $query->where('user_id', $user->id);
        })->count();
        
        
        return $my_owners;
    }
}
