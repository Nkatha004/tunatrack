<?php

namespace App\Filament\Imports;

use App\Models\Vehicle;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;

class VehicleImporter extends Importer
{
    protected static ?string $model = Vehicle::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('registration_number')
                ->requiredMapping()
                ->rules(['required', 'max:255']),
            ImportColumn::make('make')
                ->rules(['max:50', 'nullable']),
            ImportColumn::make('model')
                ->rules(['max:50', 'nullable']),
            ImportColumn::make('color')
                ->rules(['max:20', 'nullable'])
        ];
    }

    public function resolveRecord(): ?Vehicle
    {
        $vehicle = new Vehicle();

        $vehicle->registration_number = $this->data['registration_number'];
        $vehicle->make = $this->data['make'] ?? null;
        $vehicle->model = $this->data['model'] ?? null;
        $vehicle->color = $this->data['color'] ?? null;

        $vehicle->company_id = $this->options['company_id'];

        return $vehicle;
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your vehicle import has completed and ' . number_format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }
}
