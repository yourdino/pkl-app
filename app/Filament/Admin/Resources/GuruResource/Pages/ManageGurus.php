<?php

namespace App\Filament\Admin\Resources\GuruResource\Pages;

use App\Filament\Admin\Resources\GuruResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageGurus extends ManageRecords
{
    protected static string $resource = GuruResource::class;

    protected function getHeaderActions(): array
    {
        return [
            \Filament\Actions\CreateAction::make()
                ->label('Tambah Guru'),
        ];
    }
}
