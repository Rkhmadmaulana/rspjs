<?php

namespace App\Filament\Resources\TbNewsResource\Pages;

use App\Filament\Resources\TbNewsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTbNews extends EditRecord
{
    protected static string $resource = TbNewsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
