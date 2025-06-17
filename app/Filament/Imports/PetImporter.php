<?php

namespace App\Filament\Imports;

use App\Models\Pet;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;

class PetImporter extends Importer
{
    protected static ?string $model = Pet::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('name')
                ->requiredMapping()
                ->rules(['required', 'max:255']),

            ImportColumn::make('type')
                ->requiredMapping()
                ->rules(['required', 'max:255']),

            ImportColumn::make('birth_date')
                ->rules(['date']),

            ImportColumn::make('weight')
                ->requiredMapping()
                ->rules(['required', 'max:255']),

            ImportColumn::make('owner')
                ->requiredMapping()
                ->relationship()
                ->rules(['required']),
                
            ImportColumn::make('registration_date')
                ->requiredMapping()
                ->rules(['required', 'date']),
        ];
    }

    public function resolveRecord(): ?Pet
    {
        // return Pet::firstOrNew([
        //     // Update existing records, matching them by `$this->data['column_name']`
        //     'email' => $this->data['email'],
        // ]);

        return new Pet();
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your pet import has completed and ' . number_format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }
}
