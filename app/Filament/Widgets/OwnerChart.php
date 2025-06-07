<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

use App\Models\Owner;

class OwnerChart extends ChartWidget
{
    protected static ?string $heading = 'Owner-Chart';

    public ?string $filter = 'today';

    //protected int | string | array $columnSpan = 3;

    protected function getData(): array
    {
        $data = Trend::model(Owner::class)
        ->between(
            start: now()->subMonth(),
            end: now(),
        )
        ->perDay()
        ->count();

    return [
        'datasets' => [
            [
                'label' => 'Statistik Owner',
                'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
            ],
        ],
        'labels' => $data->map(fn (TrendValue $value) => $value->date),
    ];
    }

    protected function getType(): string
    {
        return 'bar'; // 'bar', 'line', 'pie', 'polarArea', 'radar', 'scatter', 'bubble','doughnut'
    }

    protected function getFilters(): ?array
    {
        return [
            'today' => 'Today',
            'week' => 'Last week',
            'month' => 'Last month',
            'year' => 'This year',
        ];
    }
}
