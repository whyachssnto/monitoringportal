<?php

namespace App\Filament\Widgets;

use App\Models\IwoOrder;
use App\Models\Order;
use Carbon\Carbon;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Illuminate\Support\Carbon as SupportCarbon;

class TestWidget extends BaseWidget
{

    use InteractsWithPageFilters;
    protected function getStats(): array
    {
        $startDate = ! is_null($this->filters['startDate'] ?? null) ?
            Carbon::parse($this->filters['startDate']) :
            null;

        $endDate = ! is_null($this->filters['endDate'] ?? null) ?
            Carbon::parse($this->filters['endDate']) :
            now();

        //$income = Order::incomes()->get()->sum('amount');
        return [
            //
            Stat::make('Orders', Order::count())
            ->description('Orders that Create')
            ->descriptionIcon('heroicon-m-briefcase')
            ->chart([1, 3, 5, 10, 20, 40])
            ->color('warning'),
            Stat::make('Income', Order::where('status', 'Submit')->whereBetween('created_at', [$startDate, $endDate])->sum('amount'))
            ->description('Orders Hasnt Been Invoiced')
            ->descriptionIcon('heroicon-m-banknotes')
            ->chart([1, 3, 5, 10, 20, 40])
            ->color('success'),
            Stat::make('Income', Order::where('status', 'Invoice')->whereBetween('created_at', [$startDate, $endDate])->sum('amount'))
            ->description('Orders Has Been Invoiced')
            ->descriptionIcon('heroicon-m-banknotes')
            ->chart([1, 3, 5, 10, 20, 40])
            ->color('info'),
            Stat::make('IWO', IwoOrder::count())
            ->description('IWO That Create')
            ->descriptionIcon('heroicon-m-briefcase')
            ->chart([1, 3, 5, 10, 20, 40])
            ->color('amber'),
        ];
    }
}
