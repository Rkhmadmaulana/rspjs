<?php

namespace App\Filament\Resources\TbNewsResource\Pages;

use App\Filament\Resources\TbNewsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTbNews extends ListRecords
{
    protected static string $resource = TbNewsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
