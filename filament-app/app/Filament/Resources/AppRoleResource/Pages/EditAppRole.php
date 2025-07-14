<?php

namespace App\Filament\Resources\AppRoleResource\Pages;

use App\Filament\Resources\AppRoleResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAppRole extends EditRecord
{
    protected static string $resource = AppRoleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()->requiresConfirmation("Are you sure you want to delete this record?"),
        ];
    }
}
