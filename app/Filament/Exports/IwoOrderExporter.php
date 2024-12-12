<?php

namespace App\Filament\Exports;

use App\Models\IwoOrder;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;

class IwoOrderExporter extends Exporter
{
    protected static ?string $model = IwoOrder::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('id')
                ->label('ID'),
            ExportColumn::make('order_number'),
            ExportColumn::make('iwo_to'),
            ExportColumn::make('job'),
            ExportColumn::make('amount'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your iwo order export has completed and ' . number_format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
