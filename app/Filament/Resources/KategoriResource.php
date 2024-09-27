<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KategoriResource\Pages;
use App\Filament\Resources\KategoriResource\RelationManagers;
use App\Models\Kategori;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Pages\Actions\CreateAction;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Card;

class KategoriResource extends Resource
{
    protected static ?string $model = Kategori::class;

    protected static ?string $navigationIcon = 'heroicon-o-square-3-stack-3d';

    protected static ?string $navigationGroup = 'Master Data';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                //card
                Forms\Components\Card::make()
                    ->schema([

                        //name
                        Forms\Components\TextInput::make('nama')
                            ->label('Nama Kategori')
                            ->placeholder('Nama Kategori')
                            ->required(),

                        //description
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
                Tables\Columns\TextColumn::make('nama')->searchable(),
                Tables\Columns\TextColumn::make('deskripsi')
                    ->limit(200)
                    ->wrap()
                    ->extraAttributes(['style' => 'white-space: normal; word-wrap: break-word;']),
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListKategoris::route('/'),
            'create' => Pages\CreateKategori::route('/create'),
            'edit' => Pages\EditKategori::route('/{record}/edit'),
        ];
    }

    public static function getLabel(): string
    {
        return 'Kategori';
    }

    public static function getPluralLabel(): string
    {
        return 'Kategori';
    }

    public static function getNavigationLabel(): string
    {
        return 'Kategori';
    }
}
