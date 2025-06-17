<?php

namespace App\Filament\App\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

use Filament\Support\Enums\IconPosition;

use App\Models\Treatment;
use App\Models\User;

use Illuminate\Database\Eloquent\Builder;

class PersonalTreatmentOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('My Treatments',$this->getMyTreatments(auth()->user()))
                ->icon('heroicon-o-users')
                ->description('This is the Treatments count')
                ->descriptionIcon('heroicon-o-chart-bar', IconPosition::Before)
                ->color('warning')
                ->chart([1,5,6,9,12,45]),
        ];
    }

    protected function getMyTreatments(User $user)
    {
       return $my_treatments = Treatment::where('user_id', $user->id)->count();

    }
}
