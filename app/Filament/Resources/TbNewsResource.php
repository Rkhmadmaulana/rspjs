<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TbNewsResource\Pages;
use App\Filament\Resources\TbNewsResource\RelationManagers;
use App\Models\tb_news;
use App\Models\TbNews;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\DateTimePicker;


class TbNewsResource extends Resource
{
    protected static ?string $model = tb_news::class;

    protected static ?string $modelLabel = 'News';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nm_news')
                ->label('Judul Berita')
                ->required(),
                Forms\Components\Select::make('category_news')
                ->label('Kategori')
                ->options([
                    'berita' => 'Berita',
                    'jadwal' => 'Jadwal',
                ])
                ->required(),
                Forms\Components\DateTimePicker::make('date_news')
                ->label('Tanggal Berita')
                ->required()
                ->columnSpan('2'),
                Forms\Components\RichEditor::make('news')
                ->label('Isi Berita')
                ->required()
                ->columnSpan('2')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            'index' => Pages\ListTbNews::route('/'),
            'create' => Pages\CreateTbNews::route('/create'),
            'edit' => Pages\EditTbNews::route('/{record}/edit'),
        ];
    }
}
