<?php

namespace App\Filament\App\Widgets;

use Filament\Widgets\ChartWidget;

use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

use App\Models\Treatment;
//use Illuminate\Database\Eloquent\Builder;

class PersonalTreatmentChart extends ChartWidget
{
    protected static ?string $heading = 'Treatment-Chart';

    protected static string $color = 'primary';

    protected function getData(): array
    {

        $data = Trend::query(Treatment::query()->where('user_id', auth()->user()->id))
        ->between(
            start: now()->subMonth(),
            end: now(),
        )
        ->perDay()
        ->count();

        return [
            'datasets' => [
            [
                'label' => 'Statistik Treatments',
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
