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

use Illuminate\Support\Str;

use Filament\Tables\Actions\ImportAction;
use App\Filament\Imports\UserImporter;

use App\Filament\Exports\UserExporter;
use Filament\Tables\Actions\ExportAction;




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

                Forms\Components\Section::make('Veterinarian Information')
                ->description('Fill in the details of the veterinarian')

                ->schema([

                    Forms\Components\TextInput::make('name')
                        ->required()
                        ->placeholder('The name is here')
                        ->maxLength(255),

                    Forms\Components\TextInput::make('email')
                        ->email()
                        ->required()
                        ->placeholder('The email is here')
                        ->maxLength(255),
                    
                    Forms\Components\TextInput::make('password')
                        ->password()
                        ->required()
                        ->placeholder('The password is here')
                        ->maxLength(255),

                    Forms\Components\TextInput::make('password_confirmation')
                        ->password()
                        ->required()
                        ->placeholder('The password_confirmation is here')
                        ->same('password'),

                    

                    /* Forms\Components\Checkbox::make('company')
                        ->live(),

                    Forms\Components\TextInput::make('mostrar')
                        ->visible(fn(Forms\Get $get) => $get('company')), */
                        


                    /* Forms\Components\TextInput::make('estado')
                        ->live(onBlur:true)
                        ->afterStateUpdated(fn($state, Forms\Set $set) => $set('copia', Str::slug($state))),

                    Forms\Components\TextInput::make('copia'), */

                    
                ])
                ->columns(2)
                ->icon('heroicon-o-eye-dropper')
                ->compact(),
                

                
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->heading('List Veterinarians')
            ->description('Manage your veterinarians here.')

            ->headerActions([
                ImportAction::make()
                    ->importer(UserImporter::class),

                ExportAction::make()
                    ->exporter(UserExporter::class),
            ])

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



                Tables\Actions\ActionGroup::make([

                    Tables\Actions\ViewAction::make(),

                ])->icon('heroicon-o-cog-6-tooth')->color('warning')->tooltip('Settings'),
                //Tables\Actions\EditAction::make(),
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

                    Infolists\Components\Section::make('Veterinarian Information')
                        ->schema([

                            Infolists\Components\TextEntry::make('name')->badge(),
                            Infolists\Components\TextEntry::make('email')->badge(),
                            Infolists\Components\TextEntry::make('created_at')->date()->badge(),
                        ])->columns(2),
                
                /* Infolists\Components\TextEntry::make('weight'),
                Infolists\Components\TextEntry::make('owner.name'),
                Infolists\Components\TextEntry::make('registration_date'),
                Infolists\Components\TextEntry::make('treatments.type'),
                Infolists\Components\TextEntry::make('treatments.user.name')->label('Veterinarian'), */
                
                
                     ]);
    }
}
