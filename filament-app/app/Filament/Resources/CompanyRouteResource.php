<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CompanyRouteResource\Pages;
use App\Filament\Resources\CompanyRouteResource\RelationManagers;
use App\Models\CompanyRoute;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Utils\AppUtils;

class CompanyRouteResource extends Resource
{
    protected static ?string $model = CompanyRoute::class;

    protected static ?string $navigationIcon = 'heroicon-o-map-pin';

    protected static ?string $navigationGroup = AppUtils::ADMIN_MANAGEMENT_NAVIGATION_GROUP;

    protected static ?string $navigationLabel = 'Routes';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('route_name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('start_location')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('end_location')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('route_name')
                    ->label('Route Name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('start_location')
                    ->label('Start Location')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('end_location')
                    ->label('Destination')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Created At')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Updated At')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('createdBy.name')
                    ->label('Created By')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updatedBy.name')           
                    ->label('Updated By')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),  
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCompanyRoutes::route('/'),
            'create' => Pages\CreateCompanyRoute::route('/create'),
            'edit' => Pages\EditCompanyRoute::route('/{record}/edit'),
        ];
    }
}
