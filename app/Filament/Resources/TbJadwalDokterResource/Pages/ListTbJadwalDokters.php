<?php

namespace App\Filament\Resources\TbJadwalDokterResource\Pages;

use App\Filament\Resources\TbJadwalDokterResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTbJadwalDokters extends ListRecords
{
    protected static string $resource = TbJadwalDokterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
