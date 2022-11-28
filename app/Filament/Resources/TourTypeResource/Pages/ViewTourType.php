<?php

namespace App\Filament\Resources\TourTypeResource\Pages;

use App\Filament\Resources\TourTypeResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewTourType extends ViewRecord
{
    protected static string $resource = TourTypeResource::class;

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
