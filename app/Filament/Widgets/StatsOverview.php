<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Users', '1000')
                ->label('Total Users')
                ->description('Total number of users in the system')
                ->icon('heroicon-o-users')
                ->color('success'),

            Stat::make('Number of Universities', '100')
                ->label('Number of Universities')
                ->description('Total number of universities in the system')
                ->icon('heroicon-o-building-office')
                ->color('info'),

            Stat::make('Number of Programs', '500')
                ->label('Number of Programs')
                ->description('Total number of programs in the system')
                ->icon('heroicon-o-book-open')
                ->color('warning'),

            Stat::make('Number of Partmer Agents', '20')
                ->label('Number of Partmer Agents')
                ->description('Total number of partmer agents in the system')
                ->icon('heroicon-o-user-group')
                ->color('danger'),
        ];
    }
}
