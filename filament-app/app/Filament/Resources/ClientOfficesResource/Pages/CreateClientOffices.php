<?php

namespace App\Filament\Resources\ClientOfficesResource\Pages;

use App\Filament\Resources\ClientOfficesResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateClientOffices extends CreateRecord
{
    protected static string $resource = ClientOfficesResource::class;

    protected static ?string $title = 'Create Office';
}
