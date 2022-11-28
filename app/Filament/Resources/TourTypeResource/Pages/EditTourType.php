<?php

namespace App\Filament\Resources\TourTypeResource\Pages;

use App\Filament\Resources\TourTypeResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTourType extends EditRecord
{
    protected static string $resource = TourTypeResource::class;

    protected function getActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
