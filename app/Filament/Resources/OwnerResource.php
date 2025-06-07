<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OwnerResource\Pages;
use App\Filament\Resources\OwnerResource\RelationManagers;
use App\Models\Owner;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use Filament\Infolists;
use Filament\Infolists\Infolist;

//use App\Filament\Clusters\Settings;

class OwnerResource extends Resource
{
    protected static ?string $model = Owner::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $navigationGroup = 'RESOURCES';

    protected static ?string $navigationBadgeTooltip = 'The number of owners';

    //protected static ?string $cluster = Settings::class;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

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
                    //->collapsed()
                

                
                    
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table

            ->heading('List Owners')
            ->description('Manage your owners here.')

            //->striped()

            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),

                Tables\Columns\TextColumn::make('last_name')
                    ->searchable(),

                Tables\Columns\TextColumn::make('email')
                    ->searchable()
                    ->icon('heroicon-m-envelope')
                    ->iconColor('warning')
                    ->copyable(),

                Tables\Columns\TextColumn::make('phone')
                    ->searchable(),

                Tables\Columns\TextColumn::make('address')
                    ->searchable(),
               
            ])
            ->filters([
                //
            ])
            ->actions([

                Tables\Actions\ActionGroup::make([

                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),

                ])->icon('heroicon-o-cog-6-tooth')->color('warning')->tooltip('Settings'),
                
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
            'index' => Pages\ListOwners::route('/'),
            'create' => Pages\CreateOwner::route('/create'),
            'edit' => Pages\EditOwner::route('/{record}/edit'),
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
                Infolists\Components\TextEntry::make('phone'),
                Infolists\Components\TextEntry::make('address'),
                    
            ]);
    }

        
}
