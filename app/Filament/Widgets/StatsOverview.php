<?php
namespace App\Filament\Widgets;

use App\Models\Application;
use App\Models\Job;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        return [
            Stat::make('Total Pelamar', Application::count())
                ->description('Keseluruhan berkas masuk')
                ->descriptionIcon('heroicon-m-user-group')
                ->color('primary'),

            Stat::make('Menunggu Review', Application::where('status', 'pending')->count())
                ->description('Perlu diverifikasi HRD')
                ->descriptionIcon('heroicon-m-clock')
                ->color('warning'),

            Stat::make('Lolos Seleksi', Application::where('status', 'accepted')->count())
                ->description('Pelamar diterima')
                ->descriptionIcon('heroicon-m-check-circle')
                ->color('success'),

            Stat::make('Lowongan Aktif', Job::count())
                ->description('Posisi yang dibuka')
                ->descriptionIcon('heroicon-m-briefcase')
                ->color('info'),
        ];
    }
}
?>