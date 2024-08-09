<?php

namespace App\Filament\Widgets;

use App\Models\Order;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class OrderChartWidget extends ChartWidget
{
    protected static ?string $heading = 'Orders';
    protected int|string|array $columnSpan = 'full';
    protected static ?string $maxHeight = '200px';

    public ?string $filter = 'year';

    protected function getFilters(): array|null
    {
        return [
            'week' => 'Last Week',
            'month' => 'Last Month',
            'year' => 'Last Year',
        ];
    }

    protected function getData(): array
    {
        $filter = $this->filter;

        match ($filter) {
            'week' => $data = Trend::model(Order::class)
                ->between(
                    start: now()->subWeek(),
                    end: now(),
                )
                ->perDay()
                ->count(),
            'month' => $data = Trend::model(Order::class)
                ->between(
                    start: now()->subMonth(),
                    end: now(),
                )
                ->perDay()
                ->count(),
            'year' => $data = Trend::model(Order::class)
                ->between(
                    start: now()->subMonths(12),
                    end: now(),
                )
                ->perMonth()
                ->count(),
        };

        return [
            'datasets' => [
                [
                    'label' => 'Orders',
                    'data' => $data->map(fn(TrendValue $value) => $value->aggregate),
                ],
            ],
            'labels' => $data->map(fn(TrendValue $value) => $value->date),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
