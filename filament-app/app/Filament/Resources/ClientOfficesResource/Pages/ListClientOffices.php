<?php

namespace App\Filament\Resources\ClientOfficesResource\Pages;

use App\Filament\Resources\ClientOfficesResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListClientOffices extends ListRecords
{
    protected static string $resource = ClientOfficesResource::class;

    protected static ?string $title = 'Offices';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Add Office')
        ];
    }
}
