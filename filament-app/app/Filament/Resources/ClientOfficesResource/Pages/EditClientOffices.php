<?php

namespace App\Filament\Resources\ClientOfficesResource\Pages;

use App\Filament\Resources\ClientOfficesResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditClientOffices extends EditRecord
{
    protected static string $resource = ClientOfficesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
