<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KategoriUsahaResource\Pages;
use App\Models\Kategori_Usaha;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class KategoriUsahaResource extends Resource
{
    protected static ?string $model = Kategori_Usaha::class;

    protected static ?string $navigationIcon = 'heroicon-o-tag';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_kategori')
                    ->label('Nama Kategori')
                    ->required()
                    ->maxLength(255),

                Forms\Components\Textarea::make('deskripsi')
                    ->label('Deskripsi')
                    ->nullable(),

                Forms\Components\FileUpload::make('icon')
                    ->label('Ikon')
                    ->image()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_kategori')
                    ->label('Nama Kategori')
                    ->searchable(),

                Tables\Columns\ImageColumn::make('icon')
                    ->label('Ikon'),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListKategoriUsahas::route('/'),
            'create' => Pages\CreateKategoriUsaha::route('/create'),
            'edit' => Pages\EditKategoriUsaha::route('/{record}/edit'),
        ];
    }
}
