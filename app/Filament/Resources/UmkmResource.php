<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UmkmResource\Pages;
use App\Models\Umkm;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class UmkmResource extends Resource
{
    protected static ?string $model = Umkm::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-storefront';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_umkm')
                    ->label('Nama UMKM')
                    ->required()
                    ->maxLength(100),

                Forms\Components\TextInput::make('jenis_usaha')
                    ->label('Jenis Usaha')
                    ->required()
                    ->maxLength(50),

                Forms\Components\Textarea::make('alamat')
                    ->label('Alamat')
                    ->required(),

                Forms\Components\TextInput::make('kelurahan')
                    ->label('Kelurahan')
                    ->required()
                    ->maxLength(50),

                Forms\Components\TextInput::make('kecamatan')
                    ->label('Kecamatan')
                    ->required()
                    ->maxLength(50),

                Forms\Components\TextInput::make('no_telp')
                    ->label('No. Telepon')
                    ->tel()
                    ->maxLength(20)
                    ->nullable(),

                Forms\Components\TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->maxLength(50)
                    ->nullable(),

                Forms\Components\TextInput::make('pemilik')
                    ->label('Nama Pemilik')
                    ->required()
                    ->maxLength(100),

                Forms\Components\TextInput::make('tahun_berdiri')
                    ->label('Tahun Berdiri')
                    ->numeric()
                    ->minValue(1900)
                    ->maxValue((int) date('Y'))
                    ->nullable(),

                Forms\Components\TextInput::make('jumlah_karyawan')
                    ->label('Jumlah Karyawan')
                    ->numeric()
                    ->minValue(0)
                    ->nullable(),

                Forms\Components\TextInput::make('omset_perbulan')
                    ->label('Omset Per Bulan')
                    ->numeric()
                    ->nullable(),

                Forms\Components\Select::make('status_verifikasi')
                    ->label('Status Verifikasi')
                    ->options([
                        'terverifikasi' => 'Terverifikasi',
                        'belum terverifikasi' => 'Belum Terverifikasi',
                    ])
                    ->required(),

                Forms\Components\DatePicker::make('tanggal_input')
                    ->label('Tanggal Input')
                    ->default(now())
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_umkm')
                    ->label('Nama UMKM')
                    ->searchable(),

                Tables\Columns\TextColumn::make('jenis_usaha')
                    ->label('Jenis Usaha')
                    ->searchable(),

                Tables\Columns\TextColumn::make('alamat')
                    ->label('Alamat')
                    ->limit(50),

                Tables\Columns\TextColumn::make('pemilik')
                    ->label('Pemilik')
                    ->searchable(),

                Tables\Columns\TextColumn::make('status_verifikasi')
                    ->label('Status Verifikasi')
                    ->enum([
                        'terverifikasi' => 'Terverifikasi',
                        'belum terverifikasi' => 'Belum Terverifikasi',
                    ]),

                Tables\Columns\TextColumn::make('tanggal_input')
                    ->label('Tanggal Input')
                    ->dateTime(),
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
            'index' => Pages\ListUmkms::route('/'),
            'create' => Pages\CreateUmkm::route('/create'),
            'edit' => Pages\EditUmkm::route('/{record}/edit'),
        ];
    }
}
