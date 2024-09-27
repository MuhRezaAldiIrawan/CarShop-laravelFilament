<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TipeModelResource\Pages;
use App\Filament\Resources\TipeModelResource\RelationManagers;
use App\Models\Kategori;
use App\Models\TipeModel;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components\Tabs;
use Filament\Support\Enums\IconPosition;
use BladeUI\Icons\Components\Icon;
use Filament\Tables\Columns\ImageColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Infolists\Components\Html;
use Filament\Infolists\Components\ViewEntry;

class TipeModelResource extends Resource
{
    protected static ?string $model = TipeModel::class;

    protected static ?string $navigationIcon = 'heroicon-o-truck';

    protected static ?string $navigationGroup = 'Master Data';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                //card
                Forms\Components\Card::make()
                    ->schema([

                        //image
                        Forms\Components\FileUpload::make('gambar')
                            ->label('Gambar')
                            ->required(),

                        //grid
                        Forms\Components\Grid::make(2)
                            ->schema([

                                //title
                                Forms\Components\TextInput::make('nama')
                                    ->label('Nama')
                                    ->placeholder('Nama')
                                    ->required(),

                                //category
                                Forms\Components\Select::make('kategori_id')
                                    ->label('Kategori')
                                    ->relationship('kategori', 'nama')
                                    ->options(Kategori::all()->pluck('nama', 'id'))
                                    ->searchable()
                                    ->required(),
                            ]),

                        Forms\Components\TextInput::make('video_link')
                                ->label('Link Video')
                                ->placeholder('Link Video Tipe Model')
                                ->url(),

                        //content
                        Forms\Components\Textarea::make('deskripsi')
                            ->label('Deskripsi')
                            ->placeholder('Deskripsi')
                            ->required(),

                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('gambar'),
                Tables\Columns\TextColumn::make('nama')->searchable(),
                Tables\Columns\TextColumn::make('kategori.nama')->searchable(),
                Tables\Columns\TextColumn::make('deskripsi')
                    ->limit(10)
                    ->wrap()
                    ->extraAttributes(['style' => 'white-space: normal; word-wrap: break-word;']),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ViewAction::make()
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Section::make('Info Model')
                ->schema([
                    ImageEntry::make('gambar')
                        ->label('Gambar Model')
                        ->extraAttributes(['class' => 'cursor-zoom-in', 'alt' => 'Gambar Model', 'title' => 'Gambar Model', 'width' => '100%', 'height' => 'auto', 'loading' => 'lazy', 'fetchpriority' => 'high', 'decoding' => 'async'])
                        ->size('lg')
                        ->alignCenter(),
                    TextEntry::make('nama')->label('Nama Model'),
                    TextEntry::make('deskripsi')->label('Deskripsi Model'),
                    ViewEntry::make('video_link')
                        ->label('Video YouTube')
                        ->view('infolists.components.youtube'),
                    ])

            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getLabel(): string
    {
        return 'Tipe Model';
    }

    public static function getPluralLabel(): string
    {
        return 'Tipe Model';
    }

    public static function getNavigationLabel(): string
    {
        return 'Tipe Model';
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTipeModels::route('/'),
            'create' => Pages\CreateTipeModel::route('/create'),
            'edit' => Pages\EditTipeModel::route('/{record}/edit'),
            'view' => Pages\ViewTipeModel::route('/{record}'),
        ];
    }
}
