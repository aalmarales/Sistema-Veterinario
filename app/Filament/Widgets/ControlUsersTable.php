<?php

namespace App\Filament\Widgets;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

use App\Models\User; 

//use App\Models\Pet;

//use App\Models\Treatment; 

class ControlUsersTable extends BaseWidget
{
    public function table(Table $table): Table
    {
        return $table
            ->query(
                User::query(),
            )
            ->columns([
                
                Tables\Columns\TextColumn::make('name'),
                    
                Tables\Columns\TextColumn::make('email'),

                Tables\Columns\TextColumn::make('created_at')->date(),

                



                
                    
                //Tables\Columns\TextColumn::make('owner.name'),
                //Tables\Columns\TextColumn::make('treatments.type'),
                //Tables\Columns\TextColumn::make('treatments.veterinarian.name'),
                //Tables\Columns\IconColumn::make('treatments.status')->boolean(),
                    
            ]);
    }
}
