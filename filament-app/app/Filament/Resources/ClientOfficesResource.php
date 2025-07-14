<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ClientOfficesResource\Pages;
use App\Filament\Resources\ClientOfficesResource\RelationManagers;
use App\Models\ClientOffices;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Utils\AppUtils;

class ClientOfficesResource extends Resource
{
    protected static ?string $model = ClientOffices::class;

    protected static ?string $navigationLabel = 'Offices';

    protected static ?string $navigationIcon = 'heroicon-o-building-office-2';

    protected static ?string $navigationGroup = AppUtils::ADMIN_MANAGEMENT_NAVIGATION_GROUP;

    public static function getBreadcrumb(): string
    {
        return 'Offices';
    }

    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery();

        // Admins see all offices
        if (auth()->user()->hasRole('admin')) {
            return $query;
        }

        // Restrict to user's company offices
        return $query->where('company_id', auth()->user()->company_id);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->maxLength(255)
                    ->nullable(),
                Forms\Components\TextInput::make('phone_number')
                    ->tel()
                    ->maxLength(20)
                    ->nullable(),
                Forms\Components\TextInput::make('address')
                    ->maxLength(255)
                    ->nullable(),
                Forms\Components\TextInput::make('town')
                    ->required()
                    ->maxLength(100),
                Forms\Components\Select::make('country')
                    ->default('Kenya')
                    ->required()
                    ->searchable()
                    ->searchPrompt('Search for country')
                    ->noSearchResultsMessage('Not found, contact support if you need this country added.')
                    ->label('Country')
                    ->options([
                        'Kenya',
                        'Uganda',
                        'Tanzania',
                        'Rwanda',
                        'Burundi',
                        'South Sudan',
                        'Somalia',
                        'Ethiopia',
                        'Djibouti',
                        'Eritrea',
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
       return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Office Name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('email')
                    ->label('Email Address')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('phone_number')
                    ->label('Phone Number')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('town')
                    ->label('Town')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('country')  
                    ->label('Country')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('address')
                    ->label('Address')
                    ->searchable()
                    ->sortable(),
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
            ->headerActions([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListClientOffices::route('/'),
            'create' => Pages\CreateClientOffices::route('/create'),
            'edit' => Pages\EditClientOffices::route('/{record}/edit'),
        ];
    }
}
