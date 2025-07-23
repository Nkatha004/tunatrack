<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CompanyResource\Pages;
use App\Filament\Resources\CompanyResource\RelationManagers;
use App\Models\Company;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Utils\AppUtils;

class CompanyResource extends Resource
{
    protected static ?string $model = Company::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-library';

    protected static ?string $navigationGroup = AppUtils::ACCESS_MANAGEMENT_NAVIGATION_GROUP;

    public static function shouldRegisterNavigation(): bool
    {
        return AppUtils::isAdmin();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(150)
                    ->label('Company Name'),
                
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(50)
                    ->label('Email Address'),
                Forms\Components\TextInput::make('phone_number')
                    ->tel()
                    ->required()
                    ->maxLength(15)
                    ->label('Phone Number'),
                Forms\Components\TextInput::make('address')
                    ->nullable()
                    ->maxLength(100)
                    ->required()
                    ->label('Address'),

                Forms\Components\TextInput::make('town')
                    ->required()
                    ->maxLength(50)
                    ->label('Town'),

                Forms\Components\Select::make('country')
                    ->default('Kenya')
                    ->required()
                    ->searchable()
                    ->searchPrompt('Please select the country the office is located in here')
                    ->noSearchResultsMessage('Not found, contact support if you need this country added.')
                    ->label('Office Country')
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
                Forms\Components\FileUpload::make('logo')
                    ->nullable()
                    ->directory('logos')
                    ->acceptedFileTypes(['image/jpg', 'image/jpeg', 'image/png'])
                    ->label('Company Logo'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable()
                    ->label('Company Name'),

                Tables\Columns\TextColumn::make('email')
                    ->searchable()
                    ->sortable()
                    ->label('Email Address'),
                Tables\Columns\TextColumn::make('phone_number')
                    ->searchable()
                    ->sortable()
                    ->label('Phone Number'),

                Tables\Columns\ImageColumn::make('logo')
                    ->label('Logo'),
                    
                Tables\Columns\TextColumn::make('address')
                    ->searchable()
                    ->sortable()
                    ->label('Address'),

                Tables\Columns\TextColumn::make('town')
                    ->searchable()
                    ->sortable()
                    ->label('Town'),

                Tables\Columns\TextColumn::make('createdBy.name')
                    ->sortable()
                    ->numeric()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updatedBy.name')
                    ->numeric()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                    ->requiresConfirmation("Are you sure you want to delete the selected companies? This action cannot be undone."),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\OfficesRelationManager::class,
            RelationManagers\UsersRelationManager::class,
            RelationManagers\VehiclesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCompanies::route('/'),
            'create' => Pages\CreateCompany::route('/create'),
            'edit' => Pages\EditCompany::route('/{record}/edit'),
        ];
    }
}
