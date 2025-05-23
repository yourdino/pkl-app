<?php

namespace App\Filament\Admin\Resources\IndustriResource\Pages;

use App\Filament\Admin\Resources\IndustriResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageIndustris extends ManageRecords
{
    protected static string $resource = IndustriResource::class;

    protected function getHeaderActions(): array
    {
        return [
            \Filament\Actions\CreateAction::make()
                ->label('Tambah Industri'),
        ];
    }
}
