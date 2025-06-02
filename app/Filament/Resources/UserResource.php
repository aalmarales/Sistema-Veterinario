<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use Filament\Infolists;
use Filament\Infolists\Infolist;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-eye-dropper';

    protected static ?string $modelLabel = 'Veterinarians';

    protected static ?string $navigationGroup = 'RESOURCES';

    protected static ?string $navigationBadgeTooltip = 'The number of veterinarians';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                    
                Forms\Components\TextInput::make('password')
                    ->password()
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('password_confirmation')
                    ->password()
                    ->required()
                    ->same('password'),
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),

                /* Tables\Columns\TextColumn::make('name')
                    ->searchable(query: function (Builder $query, string $search) {
                        return $query->where('name', 'like', "%{$search}%");
                    }, isIndividual: true), */

                Tables\Columns\TextColumn::make('email')
                    ->searchable(),

                /* Tables\Columns\TextColumn::make('email')
                    ->searchable(isIndividual: true), */
                
                Tables\Columns\TextColumn::make('created_at')
                    ->date(),

                //Tables\Columns\TextInputColumn::make('email'),
                    

                
                    
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
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
                Infolists\Components\TextEntry::make('email'),
                Infolists\Components\TextEntry::make('created_at')->date(),
                /* Infolists\Components\TextEntry::make('weight'),
                Infolists\Components\TextEntry::make('owner.name'),
                Infolists\Components\TextEntry::make('registration_date'),
                Infolists\Components\TextEntry::make('treatments.type'),
                Infolists\Components\TextEntry::make('treatments.user.name')->label('Veterinarian'), */
                
                
                     ]);
    }
}
