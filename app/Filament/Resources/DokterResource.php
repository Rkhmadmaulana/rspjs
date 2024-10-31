<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DokterResource\Pages;
use App\Filament\Resources\DokterResource\RelationManagers;
use App\Models\tb_dokter;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\FileUpload;
// use Filament\Tables\Columns\CheckboxColumn;
// use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Columns\CheckboxColumn;

class DokterResource extends Resource
{
    protected static ?string $model = tb_dokter::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nm_dokter')
                ->label('Nama Lengkap Dokter')
                ->required(),
                Forms\Components\Select::make('jk')
                ->label('Jenis Kelamin')
                ->options([
                    'Laki-laki' => 'Laki-laki',
                    'Perempuan' => 'Perempuan',  
                ])
                ->required(),
                Forms\Components\TextInput::make('tmp_lahir')
                ->label('Tempat Lahir')
                ->required(),
                Forms\Components\DatePicker::make('tgl_lahir')
                ->label('Tanggal Lahir')
                ->required(),
                Forms\Components\TextInput::make('almt_tgl')
                ->label('Alamat Tinggal')
                ->required()
                ->columnSpan(2),
                Forms\Components\TextInput::make('agama')
                ->label('Agama'),
                Forms\Components\TextInput::make('no_telp')
                ->label('No. Telepon'),
                Forms\Components\TextInput::make('alumni')
                ->label('Alumni'),
                Forms\Components\TextInput::make('no_ijin_praktek')
                ->label('No. Izin Praktek')
                ->required(),
                Forms\Components\Select::make('stts_nikah')
                ->label('Status Pernikahan')
                ->options([
                    'Sudah' => 'Sudah',
                    'Belum' => 'Belum',
                ])
                ->columnSpan(2),
                Forms\Components\FileUpload::make('image')
                ->label('Upload Foto Dokter')
                ->disk('public')
                ->directory('uploads')
                ->image()
                ->maxSize(1024)
                ->openable()
                ->columnSpan('2'),
                Forms\Components\Select::make('kd_sps')
                ->label('Kode Spesialis')
                ->options([
                    'umum' => 'Umum',
                    'spesialis' => 'Spesialis',
                ])
                ->columnSpan(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('nm_dokter')
                ->label('Nama Dokter'),
                TextColumn::make('no_ijin_praktek')
                ->label('No Izin Praktek'),
                ImageColumn::make('image')
                ->label('File Berita')
                ->square()
                ->width(200)
                ->height(150)
                ->disk('public'),
                // ->defaultImageUrl(url('public/storage/uploads/01JBDNRFMC3F0F3WNPZ3TKGDPV.png'))
                CheckboxColumn::make('status')
                ->label('Status Dokter')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDokters::route('/'),
            'create' => Pages\CreateDokter::route('/create'),
            'edit' => Pages\EditDokter::route('/{record}/edit'),
        ];
    }
}
