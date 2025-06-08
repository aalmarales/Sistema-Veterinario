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

use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ActionGroup;

use Filament\Tables\Columns\Summarizers\Average;
use Filament\Tables\Columns\Summarizers\Sum;

//use Filament\Forms\Set;
use Carbon\Carbon;

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
                    ->searchable()
                    ->description(fn(Treatment $record)=> $record->description),

                //Tables\Columns\TextColumn::make('description')
                    //->wrap(),

                Tables\Columns\TextColumn::make('start_date')
                    ->date(),
                    
                Tables\Columns\TextColumn::make('end_date')
                    ->date(),
                   
                    
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->state(function (Treatment $record){
                        if(Carbon::parse($record->end_date)->isPast())
                        {
                            $record->status = 'completed';
                            $record->save();
                        } 
                        return $record->status;
                    })
                    ->color(fn(string $state) => match($state){
                        'pending' => 'warning',
                        'in_progress' => 'primary',
                        'completed' => 'success',
                        
                    })
                    ->searchable(),

                Tables\Columns\TextColumn::make('pet.name'),
                    
                Tables\Columns\TextColumn::make('user.name')->label('Veterinarian')
                    ->searchable(),

                Tables\Columns\TextColumn::make('amount')
                ->summarize([
                    //Average::make()->money('EUR'),

                    Sum::make()->label('Total')->money('EUR'),
                ]),
              
         
            ])
            ->filters([
                //
            ])
            ->actions([
               
                
                ActionGroup::make([

                    Tables\Actions\ViewAction::make(),
                    //Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),


                   /*  Action::make('Complete')
                    ->action(function (Treatment $record) {
                        $record->status = 'completed';
                        $record->save();
                    })
                    ->hidden(fn (Treatment $record) => $record->status === 'completed'),

                Action::make('In Progress...')
                    ->action(function (Treatment $record) {
                        $record->status = 'in_progress';
                        $record->save();
                    })
                    ->hidden(fn (Treatment $record) => $record->status === 'in_progress'),
                    
                Action::make('Pending')
                    ->action(function (Treatment $record) {
                        $record->status = 'pending';
                        $record->save();
                    })
                    ->hidden(fn (Treatment $record) => $record->status === 'pending'), */
                    
                ])->icon('heroicon-o-cog-6-tooth')->color('warning')->tooltip('Settings'),
                

                
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),

            ])
            ->defaultGroup('status');
            //->groupsOnly();
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

                    Infolists\Components\Section::make('Treatments Information')
                        ->schema([

                            Infolists\Components\TextEntry::make('type')->badge(),
                            Infolists\Components\TextEntry::make('description')->badge(),
                            Infolists\Components\TextEntry::make('start_date')->badge(),
                            Infolists\Components\TextEntry::make('end_date')->badge(),
                            Infolists\Components\TextEntry::make('status')->badge(),
                            Infolists\Components\TextEntry::make('pet.name')->badge(),
                            Infolists\Components\TextEntry::make('user.name')->label('Veterinarian')->badge(),
                            Infolists\Components\TextEntry::make('amount')->badge(),
                
                        ])->columns(2),
                
                     ]);
    }
}
