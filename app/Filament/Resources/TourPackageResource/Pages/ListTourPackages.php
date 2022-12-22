<?php

namespace App\Filament\Resources\TourPackageResource\Pages;

use App\Filament\Resources\TourPackageResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTourPackages extends ListRecords
{
    protected static string $resource = TourPackageResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
