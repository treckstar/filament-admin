<?php

namespace App\Filament\Resources\BuilderPageResource\Pages;

use App\Filament\Resources\BuilderPageResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageBuilderPages extends ManageRecords
{
    protected static string $resource = BuilderPageResource::class;

    protected function getActions(): array
    {
        return [
            //Actions\CreateAction::make(),
        ];
    }
}
