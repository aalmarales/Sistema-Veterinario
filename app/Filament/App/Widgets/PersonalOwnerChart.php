<?php

namespace App\Filament\App\Widgets;

use Filament\Widgets\ChartWidget;

use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

use App\Models\Owner;
use Illuminate\Database\Eloquent\Builder;

class PersonalOwnerChart extends ChartWidget
{
    protected static ?string $heading = 'Owner-Chart';

    protected static string $color = 'primary';

    protected function getData(): array
    {
        $user = auth()->user();

        $data = Trend::query(Owner::query()->whereHas('pets.treatments', function(Builder $query) use ($user){
            $query->where('user_id',$user->id);
        } ))
        ->between(
            start: now()->subMonth(),
            end: now(),
        )
        ->perDay()
        ->count();
        return [
            'datasets' => [
            [
                'label' => 'Statistik Owners',
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
