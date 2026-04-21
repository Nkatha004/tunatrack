<?php

namespace App\Filament\Resources\CompanyRouteResource\Pages;

use App\Filament\Resources\CompanyRouteResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCompanyRoute extends EditRecord
{
    protected static string $resource = CompanyRouteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
