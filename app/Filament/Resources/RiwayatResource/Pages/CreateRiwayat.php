<?php

namespace App\Filament\Resources\RiwayatResource\Pages;

use App\Filament\Resources\RiwayatResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateRiwayat extends CreateRecord
{
    protected static string $resource = RiwayatResource::class;
    protected static bool $canCreateAnother = false;

    //customize redirect after create
    public function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
