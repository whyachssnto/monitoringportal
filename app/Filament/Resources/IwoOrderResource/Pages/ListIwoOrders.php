<?php

namespace App\Filament\Resources\IwoOrderResource\Pages;

use App\Filament\Resources\IwoOrderResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListIwoOrders extends ListRecords
{
    protected static string $resource = IwoOrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
