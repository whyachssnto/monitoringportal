<?php

namespace App\Filament\Widgets;

use App\Models\Customer;
use Filament\Widgets\Widget;

class TotalRevenueWidget extends Widget
{
    protected static string $view = 'filament.widgets.total-revenue-widget';

    public function getTotalRevenue(): float
    {
        return Customer::sum('amount');
    }
}

