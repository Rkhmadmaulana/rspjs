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
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
// use Filament\Tables\Columns\CheckboxColumn;
// use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\ToggleColumn;


class TbNewsResource extends Resource
{
    protected static ?string $model = tb_news::class;

    protected static ?string $modelLabel = 'Berita';

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
                ->columnSpan('2'),
                Forms\Components\FileUpload::make('image')
                ->label('Upload File')
                ->disk('public')
                ->directory('uploads')
                ->image()
                ->maxSize(1024)
                // ->multiple()
                ->openable()
                ->columnSpan('2'),
                // Toggle::make('pin_news')
                // ->label('Pin Berita')
                // ->onColor('success')
                // ->offColor('danger')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('nm_news')
                ->label('Nama Berita'),
                TextColumn::make('category_news')
                ->label('Kategori Berita'),
                TextColumn::make('date_news')
                ->label('Tanggal Berita'),
                ImageColumn::make('image')
                ->label('File Berita')
                ->square()
                ->width(200)
                ->height(150)
                ->disk('public'),
                // ->defaultImageUrl(url('public/storage/uploads/01JBDNRFMC3F0F3WNPZ3TKGDPV.png'))
                ToggleColumn::make('pin_news')
                ->label('Pin Berita')

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
            'index' => Pages\ListTbNews::route('/'),
            'create' => Pages\CreateTbNews::route('/create'),
            'edit' => Pages\EditTbNews::route('/{record}/edit'),
        ];
    }
}
