<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TreatmentResource\Pages;
use App\Filament\Resources\TreatmentResource\RelationManagers;
use App\Models\Treatment;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use Filament\Infolists;
use Filament\Infolists\Infolist;

//use Illuminate\Database\Eloquent\Model;

class TreatmentResource extends Resource
{
    protected static ?string $model = Treatment::class;

    protected static ?string $navigationIcon = 'heroicon-o-beaker';

    protected static ?string $navigationGroup = 'RESOURCES';

    protected static ?string $navigationBadgeTooltip = 'The number of treatments';

    /* protected function handleRecordCreation(array $data): Model
    {
        
        $data['user_id'] = auth()->id();

        return static::getModel()::create($data);
    } */ 
    
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                /* Forms\Components\TextInput::make('type')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('description')
                    ->required()
                    ->maxLength(255),

                Forms\Components\DatePicker::make('start_date')
                    ->required(),

                Forms\Components\DatePicker::make('end_date')
                    ->required(),

                Forms\Components\Select::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'in_progress' => 'In Progress...',
                        'completed' => 'Completed',
                    ])
                    ->required(),

                    

                Forms\Components\Select::make('pet_id')
                    ->relationship('pet', 'name') 
                    ->required(),

                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required(),

                Forms\Components\TextInput::make('amount')
                    ->required()
                    ->numeric()
                    ->prefix('€'), */
                    
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('type')
                    ->searchable(),

                Tables\Columns\TextColumn::make('description')
                    ->searchable(),

                Tables\Columns\TextColumn::make('start_date')
                    ->date(),
                    
                Tables\Columns\TextColumn::make('end_date')
                    ->date(),
                    
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn(string $state) => match($state){
                        'pending' => 'warning',
                        'in_progress' => 'primary',
                        'completed' => 'success',
                        
                    })
                    ->searchable(),

                Tables\Columns\TextColumn::make('pet.name'),
                    
                Tables\Columns\TextColumn::make('user.name')->label('Veterinarian')
                    ->searchable(),
                    
                    
            ])
            ->filters([
                //
            ])
            ->actions([
               Tables\Actions\ViewAction::make(),
                //Tables\Actions\EditAction::make(),
                //Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListTreatments::route('/'),
            'create' => Pages\CreateTreatment::route('/create'),
            'edit' => Pages\EditTreatment::route('/{record}/edit'),
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
                Infolists\Components\TextEntry::make('type'),
                Infolists\Components\TextEntry::make('description'),
                Infolists\Components\TextEntry::make('start_date'),
                Infolists\Components\TextEntry::make('end_date'),
                Infolists\Components\TextEntry::make('status'),
                Infolists\Components\TextEntry::make('pet.name'),
                Infolists\Components\TextEntry::make('user.name')->label('Veterinarian'),
                Infolists\Components\TextEntry::make('amount'),
                
                     ]);
    }
}
