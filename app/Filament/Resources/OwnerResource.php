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

use Filament\Forms\Components\Actions;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\TextInput;

use Filament\Forms\Components\Select;

use App\Filament\Imports\OwnerImporter;
use Filament\Tables\Actions\ImportAction;

use App\Filament\Exports\OwnerExporter;
use Filament\Tables\Actions\ExportAction;

//use Illuminate\Support\Facades\Auth;

//use Illuminate\Validation\Rules\File;

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

                        /* Actions::make([
                            Action::make('send any'), */
                        ])->columns(2)
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

            ->headerActions([
                ImportAction::make()
                    ->importer(OwnerImporter::class)
                    ->maxRows(500),
                    /* ->fileRules([
                        File::types(['xlsx',
                        'xls',
                        'csv',
                        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                        'application/vnd.ms-excel',
                        'text/csv',])->max(1024 * 10),
                    ]), */

                ExportAction::make()
                    ->exporter(OwnerExporter::class),
                    //->columnMapping(false),
                    /* ->options([
                        'updateExisting' => true,
                    ]), */
            ])

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
                        //->modalIcon('heroicon-o-cursor-arrow-rays'),

                    /* Tables\Actions\Action::make('send information')
                        ->icon('heroicon-o-envelope')
                        ->requiresConfirmation(), */

                
                    /* Tables\Actions\Action::make('update')
                        ->form([
                           TextInput::make('name'),
                           TextInput::make('email'),
                            ])
                        ->fillForm(fn(Owner $record): array =>[
                            'name' => $record->name,
                            'email' => $record->email,
                        ])
                        ->disabledForm()
                        ->modalIcon('heroicon-o-trash')
                        ->modalIconColor('warning'),
                        //->modalCancelAction(false),
                        //->modalHeading('luludfgg0'), */

                ])->icon('heroicon-o-cog-6-tooth')->color('warning')->tooltip('Settings'),
                
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])->defaultSort('created_at', 'desc');
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        /* dd(request()->cookie(config('session.cookie').'_id'),
            session()->getId()); */
            //dd(request()->user());
        //dd(auth()->user());
        /* if(auth()->user()->hasRole('invitado')){
            return [
                'index' => Pages\ListOwners::route('/'),
            ];
        } */
        
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
                     Infolists\Components\Section::make('Owner Information')
                        ->schema([
                            Infolists\Components\TextEntry::make('name')->badge(),
                            Infolists\Components\TextEntry::make('email')->badge(),
                            Infolists\Components\TextEntry::make('phone')->badge(),
                            Infolists\Components\TextEntry::make('address')->badge(),
                    
                        ])->columns(2),
                
            ]);
    }

        
}
