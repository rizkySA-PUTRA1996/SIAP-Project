<?php

namespace App\Filament\Resources\EResepResource\Pages;

use App\Filament\Resources\EResepResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEResep extends EditRecord
{
    protected static string $resource = EResepResource::class;

    protected function getHeaderActions(): array
    {
        return [
        ];
    }

    //customize redirect after create
    public function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
