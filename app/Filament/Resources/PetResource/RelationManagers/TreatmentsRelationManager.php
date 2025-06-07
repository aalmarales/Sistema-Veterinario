<?php

namespace App\Filament\Resources\PetResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use Filament\Forms\Set;
use Carbon\Carbon;



class TreatmentsRelationManager extends RelationManager
{
    protected static string $relationship = 'treatments';

      public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('type')
                    ->options([
                        'Consulta General' => 'Consulta General',
                        'Vacunacion' => 'Vacunacion',
                        'Cirugia' => 'Cirugia',
                        'Odontologia' => 'Odontologia',
                        'Urgencia' => 'Urgencia',
                        'Cardiología' => 'Cardiología',
                        'Dermatología' => 'Dermatología',
                        'Diagnóstico por Imagen' => 'Diagnóstico por Imagen',
                        'Otros' => 'Otros',
                    ])
                    ->required(),
                    

                Forms\Components\TextInput::make('description')
                    ->required()
                    ->maxLength(255),

                Forms\Components\DatePicker::make('start_date')
                    ->live(onBlur:true)
                    ->minDate(today())
                    ->afterStateUpdated(function($state, Set $set){
                        
                         return $set('status', Carbon::parse($state)->isToday() ? 'in_progress' : 'pending'); 
                         
                    })
                    ->required(),

                Forms\Components\DatePicker::make('end_date')
                    ->live(onBlur:true)
                    ->minDate(today())
                    ->required(),

                Forms\Components\Hidden::make('status'),
                    //->default('completed'),
                    
                    
                        
                
                
                Forms\Components\Hidden::make('user_id')
                    ->default(auth()->user()->id),

                Forms\Components\TextInput::make('amount')
                    ->required()
                    ->numeric()
                    ->prefix('€'),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('type')
            ->columns([
                Tables\Columns\TextColumn::make('type'),

                Tables\Columns\TextColumn::make('description'),

                Tables\Columns\TextColumn::make('start_date')
                    ->date(),
                    
                Tables\Columns\TextColumn::make('end_date')
                    ->date(),
                
                Tables\Columns\TextColumn::make('status'),

                Tables\Columns\TextColumn::make('amount')
                    ->money('EUR'),
                   

            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
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
}
