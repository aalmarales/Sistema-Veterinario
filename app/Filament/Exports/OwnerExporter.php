<?php

namespace App\Filament\Exports;

use App\Models\Owner;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;

class OwnerExporter extends Exporter
{
    protected static ?string $model = Owner::class;

    public static function getColumns(): array
    {
        return [
            /* ExportColumn::make('id')
                ->label('ID')
                ->enabledByDefault(false), */

            ExportColumn::make('name'),
                //->enabledByDefault(false),

            ExportColumn::make('last_name'),
                //->enabledByDefault(false),

            ExportColumn::make('email'),
                //->enabledByDefault(false),

            ExportColumn::make('phone'),
                //->enabledByDefault(false),

            ExportColumn::make('address'),
                //->enabledByDefault(false),

            /* ExportColumn::make('created_at'),
            ExportColumn::make('updated_at'), */
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your owner export has completed and ' . number_format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
