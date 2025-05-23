<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\PklResource\Pages;
use App\Filament\Admin\Resources\PklResource\RelationManagers;
use App\Models\Pkl;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PklResource extends Resource
{
    protected static ?string $model = Pkl::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';

    protected static ?string $modelLabel = 'PKL';
    protected static ?string $pluralModelLabel = 'PKL';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('siswa_id')
                    ->label('ID Siswa')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('industri_id')
                    ->label('ID Industri')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('guru_id')
                    ->label('ID Guru')
                    ->required()
                    ->numeric(),
                Forms\Components\DatePicker::make('mulai')
                    ->label('Mulai')
                    ->required(),
                Forms\Components\DatePicker::make('selesai')
                    ->label('Selesai'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('siswa_id')
                    ->label('ID Siswa')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('industri_id')
                    ->label('ID Industri')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('guru_id')
                    ->label('ID Guru')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('mulai')
                    ->label('Mulai')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('selesai')
                    ->label('Selesai')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManagePkls::route('/'),
        ];
    }
}
