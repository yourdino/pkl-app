<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\SiswaResource\Pages;
use App\Filament\Admin\Resources\SiswaResource\RelationManagers;
use App\Models\Siswa;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\FileUpload;

class SiswaResource extends Resource
{
    protected static ?string $model = Siswa::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    protected static ?string $modelLabel = 'Siswa';
    protected static ?string $pluralModelLabel = 'Siswa';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('nis')
                    ->required()
                    ->label('NIS')
                    ->maxLength(255),
                Forms\Components\TextInput::make('gender')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('alamat')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('kontak')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('status_pkl')
                    ->label('Status PKL')
                    ->required()
                    ->options([
                        'Belum' => 'Belum PKL',
                        'Sedang' => 'Sedang PKL',
                    ])                
                    ->native(false),  
                FileUpload::make('foto')
                    ->image()
                    ->label('Foto Siswa') 
                    ->directory('fotos') // simpan ke storage/app/public/fotos
                    ->downloadable()
                    ->openable()
                    ->uploadProgressIndicatorPosition('left')
                    ->removeUploadedFileButtonPosition('right') 
                    ->required(false),         
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nis')
                    ->label('NIS')
                    ->searchable(),
                Tables\Columns\TextColumn::make('gender')
                    ->searchable(),
                Tables\Columns\TextColumn::make('alamat')
                    ->searchable(),
                Tables\Columns\TextColumn::make('kontak')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\IconColumn::make('status_pkl')
                    ->label('Status PKL')
                    ->boolean() // akan otomatis tampil true/false icon (bisa diatur juga)
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle')
                    ->trueColor('success')
                    ->falseColor('danger')
                    ->getStateUsing(function ($record) {
                        return $record->status_pkl === 'Sedang'; // true jika sedang PKL
                    }),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\ImageColumn::make('foto')
                    ->label('Foto Siswa')
                    ->disk('public')
                    ->circular()
                    ->height(50)
                    ->searchable(),                
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
            'index' => Pages\ManageSiswas::route('/'),
        ];
    }
}
