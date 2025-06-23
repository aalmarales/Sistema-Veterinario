<?php

namespace App\Filament\App\Widgets;

use Filament\Widgets\ChartWidget;

use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

use App\Models\Pet;
use Illuminate\Database\Eloquent\Builder;

class PersonalPetChart extends ChartWidget
{
    protected static ?string $heading = 'Pet-Chart';

    protected static string $color = 'primary';

    protected function getData(): array
    {
        $user = auth()->user();

        $data = Trend::query(Pet::query()->whereHas('treatments', function(Builder $query) use ($user){
            $query->where('user_id',$user->id);
        }))
        ->between(
            start: now()->subMonth(),
            end: now(),
        )
        ->perDay()
        ->count();
        return [
            'datasets' => [
            [
                'label' => 'Statistik Pets',
                'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
                //'backgroundColor' => '#red',
                //'borderColor' => '#blue',
                
            ],
        ],
        'labels' => $data->map(fn (TrendValue $value) => $value->date),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
