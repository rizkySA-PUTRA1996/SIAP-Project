<?php

namespace App\Filament\Resources\EResepDetailResource\Pages;

use App\Filament\Resources\EResepDetailResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateEResepDetail extends CreateRecord
{
    protected static string $resource = EResepDetailResource::class;
    protected static bool $canCreateAnother = false;

    //customize redirect after create
    public function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
