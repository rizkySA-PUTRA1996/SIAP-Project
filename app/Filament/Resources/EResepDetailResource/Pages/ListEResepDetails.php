<?php

namespace App\Filament\Resources\EResepDetailResource\Pages;

use App\Filament\Resources\EResepDetailResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEResepDetails extends ListRecords
{
    protected static string $resource = EResepDetailResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
