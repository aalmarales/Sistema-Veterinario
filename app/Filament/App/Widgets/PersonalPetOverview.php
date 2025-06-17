<?php

namespace App\Filament\App\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

use Filament\Support\Enums\IconPosition;

use App\Models\Pet;
use App\Models\User;

use Illuminate\Database\Eloquent\Builder;

class PersonalPetOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('My Pets', $this->getMyPets(auth()->user()))
                ->icon('heroicon-o-users')
                ->description('This is the Pets count')
                ->descriptionIcon('heroicon-o-chart-bar', IconPosition::Before)
                ->color('warning')
                ->chart([1,5,6,9,12,45]),
        ];
    }

    protected function getMyPets(User $user)
    {
        $my_pets = Pet::whereHas('treatments', function(Builder $query) use ($user){
            $query->where('user_id',$user->id);
        })->count();

        return $my_pets;
    }
}
