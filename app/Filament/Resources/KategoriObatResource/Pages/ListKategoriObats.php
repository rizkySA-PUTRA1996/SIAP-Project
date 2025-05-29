<?php

namespace App\Filament\Resources\KategoriObatResource\Pages;

use App\Filament\Resources\KategoriObatResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKategoriObats extends ListRecords
{
    protected static string $resource = KategoriObatResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
