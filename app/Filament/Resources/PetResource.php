<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PetResource\Pages;
use App\Filament\Resources\PetResource\RelationManagers;
use App\Models\Pet;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use Filament\Infolists;
use Filament\Infolists\Infolist;


use Filament\Tables\Filters\QueryBuilder;
use Filament\Tables\Filters\QueryBuilder\Constraints\TextConstraint;

use Filament\Tables\Actions\ActionGroup;



//use App\Filament\Clusters\Settings;

class PetResource extends Resource
{
    protected static ?string $model = Pet::class;

    protected static ?string $navigationIcon = 'heroicon-o-heart';

    protected static ?string $navigationGroup = 'RESOURCES';

    protected static ?string $navigationBadgeTooltip = 'The number of pets';

    //protected static ?string $cluster = Settings::class;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\Section::make('Pet Information')
                    ->description('Fill in the details of the pet')
                    ->schema([

                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->placeholder('The name is here')
                            ->maxLength(255),

                        Forms\Components\TextInput::make('type')
                            ->required()
                            ->placeholder('The type is here')
                            ->maxLength(255),

                        Forms\Components\DatePicker::make('birth_date'),

                        Forms\Components\TextInput::make('weight')
                            ->required()
                            ->placeholder('The weight is here')
                            ->numeric()
                            ->prefix('KG'),
                    
                        Forms\Components\Select::make('owner_id')
                            ->relationship('owner', 'name')
                            ->searchable()
                            ->preload()
                            ->createOptionForm([

                                 Forms\Components\Section::make('Owner Information')
                                    ->description('Fill in the details of the owner')
                                    ->schema([

                                        Forms\Components\TextInput::make('name')
                                            ->required()
                                            ->placeholder('The name is here')
                                            ->maxLength(255),
                                        Forms\Components\TextInput::make('last_name')
                                            ->required()
                                            ->placeholder('The last_name is here')
                                            ->maxLength(255),
                                        Forms\Components\TextInput::make('email')
                                            ->email()
                                            ->required()
                                            ->placeholder('The email is here')
                                            ->maxLength(255),
                                        Forms\Components\TextInput::make('phone')
                                            ->tel()
                                            ->required()
                                            ->placeholder('The phone is here')
                                            ->maxLength(255),
                                        Forms\Components\TextInput::make('address')
                                            ->placeholder('The address is here')
                                            ->maxLength(255),
                                    ])
                                    ->columns(2)
                                    ->icon('heroicon-o-users')
                                    ->compact(),
                                
                    ])
                        ->required(),

                        Forms\Components\Hidden::make('registration_date')
                            ->default(today()),
                    ])
                    ->columns(2)
                    ->icon('heroicon-o-heart')
                    ->compact(),
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('type')
                    ->searchable(),
                Tables\Columns\TextColumn::make('birth_date'),
                    
                Tables\Columns\TextColumn::make('weight')
                    ->label('Weight (Kg)'),
                    
                    
                Tables\Columns\TextColumn::make('owner.name'),
                    
                Tables\Columns\TextColumn::make('registration_date')
                    ->date(),

                Tables\Columns\TextColumn::make('treatments.type'),
                Tables\Columns\TextColumn::make('treatments.user.name')->label('Veterinarian')
                    ->searchable(),

                //Tables\Columns\TextColumn::make('cant_treatments')->avg('treatments','amount'),
                    
                    
                    
                    
                
            ])
            ->filters([
                //Tables\Filters\Filter::make('dog')->query(fn(Builder $q):Builder => $q->where('type','dog'))->toggle(),

                //Tables\Filters\TernaryFilter::make('type'),
                QueryBuilder::make('My')
                    ->constraints([
                         TextConstraint::make('type'), 
                    ])
               

                
            ])
            ->actions([
                ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ])->icon('heroicon-o-cog-6-tooth')->color('warning')->tooltip('Settings'),
                
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('registration_date','desc');
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\TreatmentsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPets::route('/'),
            'create' => Pages\CreatePet::route('/create'),
            'edit' => Pages\EditPet::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function infolist(Infolist $infolist): Infolist
    {
            return $infolist
                ->schema([
                Infolists\Components\TextEntry::make('name'),
                Infolists\Components\TextEntry::make('type'),
                Infolists\Components\TextEntry::make('birth_date'),
                Infolists\Components\TextEntry::make('weight'),
                Infolists\Components\TextEntry::make('owner.name'),
                Infolists\Components\TextEntry::make('registration_date'),
                Infolists\Components\TextEntry::make('treatments.type'),
                Infolists\Components\TextEntry::make('treatments.user.name')->label('Veterinarian'),
                
                
                     ]);
    }
}
