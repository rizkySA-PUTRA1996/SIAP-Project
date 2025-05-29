<?php

namespace App\Filament\Resources\KategoriObatResource\Pages;

use App\Filament\Resources\KategoriObatResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateKategoriObat extends CreateRecord
{
    protected static string $resource = KategoriObatResource::class;
    protected static bool $canCreateAnother = false;

    //customize redirect after create
    public function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
