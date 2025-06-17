<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

use App\Models\Pet;

class PetChart extends ChartWidget
{
    protected static ?string $heading = 'Pet-Chart';
    
    protected static string $color = 'warning';

    public ?string $filter = 'today';

    protected function getData(): array
    {
        $data = Trend::model(Pet::class)
        ->between(
            start: now()->subMonth(),
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

    public function getDescription(): ?string
    {
        return 'Behavior of the pets';
    }
}
