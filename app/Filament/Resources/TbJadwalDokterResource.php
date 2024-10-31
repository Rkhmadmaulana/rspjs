<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TbJadwalDokterResource\Pages;
use App\Filament\Resources\TbJadwalDokterResource\RelationManagers;
use App\Models\tb_jadwal_dokter;
use App\Models\tb_dokter;
use App\Models\TbJadwalDokter;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TimePicker;

class TbJadwalDokterResource extends Resource
{
    protected static ?string $model = tb_jadwal_dokter::class;

    protected static ?string $modelLabel = 'Jadwal Dokter';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\Select::make('tb_dokter_id')
                ->label('Dokter')
                ->options(tb_dokter::all()->pluck('nm_dokter', 'id'))
                ->searchable()
                ->required()
                ,
                Forms\Components\TextInput::make('poliklinik')
                ->label('Poliklinik')
                ->required()
                ,
                Forms\Components\Select::make('hari_kerja')
                ->label('Hari Kerja')
                ->options([
                    'senin' => 'Senin',
                    'selasa' => 'Selasa',
                    'rabu' => 'Rabu',
                    'kamis' => 'Kamis',
                    'jumat' => "Jum'at"
                ])
                ->required(),
                TimePicker::make('jam_mulai')
                ->label('Jam Mulai')
                ->format('H:i')
                ->withoutSeconds()
                ->required(),
                TimePicker::make('jam_selesai')
                ->label('Jam Selesai')
                ->format('H:i')
                ->withoutSeconds()
                ->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('tbdokter.nm_dokter')
                ->label('Nama Dokter'),
                TextColumn::make('poliklinik')
                ->label('Poliklinik'),
                TextColumn::make('hari_kerja')
                ->label('Hari Kerja'),
                TextColumn::make('jam_mulai')
                ->label('Jam Mulai'),
                TextColumn::make('jam_selesai')
                ->label('Jam Selesai')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    // Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListTbJadwalDokters::route('/'),
            'create' => Pages\CreateTbJadwalDokter::route('/create'),
            'edit' => Pages\EditTbJadwalDokter::route('/{record}/edit'),
        ];
    }
}
