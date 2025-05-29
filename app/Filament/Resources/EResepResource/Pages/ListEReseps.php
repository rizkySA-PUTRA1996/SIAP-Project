<?php

namespace App\Filament\Resources\EResepResource\Pages;

use App\Filament\Resources\EResepResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEReseps extends ListRecords
{
    protected static string $resource = EResepResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
