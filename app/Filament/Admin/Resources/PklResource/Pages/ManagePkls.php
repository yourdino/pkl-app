<?php

namespace App\Filament\Admin\Resources\PklResource\Pages;

use App\Filament\Admin\Resources\PklResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManagePkls extends ManageRecords
{
    protected static string $resource = PklResource::class;

    protected function getHeaderActions(): array
    {
        return [
            \Filament\Actions\CreateAction::make()
                ->label('Tambah PKL'),
        ];
    }
}
