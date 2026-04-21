<?php

namespace App\Filament\Resources\CompanyRouteResource\Pages;

use App\Filament\Resources\CompanyRouteResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCompanyRoutes extends ListRecords
{
    protected static string $resource = CompanyRouteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
