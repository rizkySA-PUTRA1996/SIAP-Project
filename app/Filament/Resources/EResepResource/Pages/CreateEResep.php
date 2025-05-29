<?php

namespace App\Filament\Resources\EResepResource\Pages;

use App\Filament\Resources\EResepResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateEResep extends CreateRecord
{
    protected static string $resource = EResepResource::class;
    protected static bool $canCreateAnother = false;

    //customize redirect after create
    public function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
