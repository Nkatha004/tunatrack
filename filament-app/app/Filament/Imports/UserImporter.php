<?php

namespace App\Filament\Imports;

use App\Models\User;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;
use App\Utils\AppUtils;

class UserImporter extends Importer
{
    protected static ?string $model = User::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('name')
                ->requiredMapping()
                ->rules(['required', 'max:100']),
            ImportColumn::make('email')
                ->rules(['email', 'nullable', 'max:50']),
            ImportColumn::make('phone_number')
                ->requiredMapping()
                ->rules(['required', 'max:15']),
        ];
    }

    public function resolveRecord(): ?User
    {
        $user = new User();

        $user->name = $this->data['name'];
        $user->email = $this->data['email'] ?? null;
        $user->phone_number = $this->data['phone_number'];
        $user->company_id = $this->options['company_id'] ?? null;
        
        return $user;
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your user import has completed and ' . number_format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }
}
