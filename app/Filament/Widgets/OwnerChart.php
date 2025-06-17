<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

use App\Models\Owner;

class OwnerChart extends ChartWidget
{
    protected static ?string $heading = 'Owner-Chart';

    protected static string $color = 'warning';

    public ?string $filter = 'today';

    //protected int | string | array $columnSpan = 3;

    protected function getData(): array
    {
        //$activeFilter = $this->filter; //Para la opcion del filtro por defecto en el chart...

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
                //'backgroundColor' => '#red',
                //'borderColor' => '#blue',
                
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

        public function getDescription(): ?string
    {
        return 'Behavior of the owners';
    }
}
