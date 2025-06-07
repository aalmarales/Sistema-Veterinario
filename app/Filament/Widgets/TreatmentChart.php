<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

use App\Models\Treatment;

class TreatmentChart extends ChartWidget
{
    protected static ?string $heading = 'Treatment-Chart';

    public ?string $filter = 'today';

    protected function getData(): array
    {
        $data = Trend::model(Treatment::class)
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
