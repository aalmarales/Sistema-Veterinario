<?php

namespace App\Filament\Imports;

use App\Models\Owner;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;

use Filament\Forms\Components\Toggle;

class OwnerImporter extends Importer
{
    protected static ?string $model = Owner::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('name')
                ->requiredMapping()
                ->rules(['required', 'max:255']),

            ImportColumn::make('last_name')
                ->requiredMapping()
                ->rules(['required', 'max:255']),

            ImportColumn::make('email')
                ->requiredMapping()
                ->rules(['required', 'email', 'max:255']),

            ImportColumn::make('phone')
                ->requiredMapping()
                ->integer()
                ->rules(['required', 'max:255']),
                
            ImportColumn::make('address')
                ->rules(['max:255']),
                
        ];
    }

    public function resolveRecord(): ?Owner
    {
        // return Owner::firstOrNew([
        //     // Update existing records, matching them by `$this->data['column_name']`
        //     'email' => $this->data['email'],
        // ]);

        return new Owner();
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your owner import has completed and ' . number_format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }

    public static function getOptionsFormComponents(): array
    {
        return [

            //Toggle::make('updateExisting'),
                
            ];
    }
}
