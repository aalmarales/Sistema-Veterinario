<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

use App\Models\User;

class UserChart extends ChartWidget
{
    protected static ?string $heading = 'Veterinarian-Chart';

    public ?string $filter = 'today';

    protected function getData(): array
    {
        $data = Trend::model(User::class)
        ->between(
            start: now()->subWeek(),
            end: now(),
        )
        ->perDay()
        ->count();

    return [
        'datasets' => [
            [
                'label' => 'Statistik Pet',
                'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
            ],
        ],
        'labels' => $data->map(fn (TrendValue $value) => $value->date),
    ];
    }

    protected function getType(): string
    {
        return 'bar';
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
