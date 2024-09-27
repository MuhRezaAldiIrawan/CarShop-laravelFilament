<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KatalogMobilResource\Pages;
use App\Filament\Resources\KatalogMobilResource\RelationManagers;
use App\Models\KatalogMobil;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KatalogMobilResource extends Resource
{
    protected static ?string $model = KatalogMobil::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Post Data Katalog';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\Section::make('Nama Mobil')
                    ->schema([

                        Forms\Components\TextInput::make('nama_mobil')
                            ->label('Nama Mobil')
                            ->suffixIcon('heroicon-m-truck')
                            ->placeholder('Nama Mobil')

                    ]),

                Forms\Components\Section::make('Spesifikasi Mobil')
                    ->schema([

                        Forms\Components\TextInput::make('tipe_model_id')
                            ->label('Tipe Mobil')
                            ->suffixIcon('heroicon-m-list-bullet')
                            ->placeholder('Tipe Mobil'),

                        Forms\Components\TextInput::make('kategori_id')
                            ->label('Kategori Mobil')
                            ->suffixIcon('heroicon-m-queue-list')
                            ->placeholder('Kategori Mobil')

                    ])
                    ->columns(2),
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
            'index' => Pages\ListKatalogMobils::route('/'),
            'create' => Pages\CreateKatalogMobil::route('/create'),
            'edit' => Pages\EditKatalogMobil::route('/{record}/edit'),
        ];
    }
}
