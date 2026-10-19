<?php

namespace App\Filament\Widgets;

use App\Models\Application;
use Filament\Widgets\ChartWidget;

class ApplicationStatusChart extends ChartWidget
{
    protected static ?string $heading = 'Distribusi Status Pelamar';
    protected static ?int $sort = 2;

    protected function getData(): array
    {
        $pending = Application::where('status', 'pending')->count();
        $accepted = Application::where('status', 'accepted')->count();
        $rejected = Application::where('status', 'rejected')->count();

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Pelamar',
                    'data' => [$pending, $accepted, $rejected],
                    'backgroundColor' => ['#f59e0b', '#10b981', '#ef4444'],
                ],
            ],
            'labels' => ['Menunggu', 'Lolos', 'Ditolak'],
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}
?>