<?php

namespace App\Filament\App\Resources\TreatmentResource\Pages;

use App\Filament\App\Resources\TreatmentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

use App\Filament\Widgets\TreatmentOverview;

class ListTreatments extends ListRecords
{
    protected static string $resource = TreatmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //Actions\CreateAction::make(),
        ];
    }

    protected  function getHeaderWidgets(): array
    {
        return [
           //TreatmentOverview::class,
        ];
    }
}
