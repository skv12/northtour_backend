<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TourResource\Pages;
use App\Filament\Resources\TourResource\RelationManagers;
use App\Models\Tour;
use App\Models\TourType;
use Filament\Forms;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;

use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TourResource extends Resource
{
    protected static ?string $model = Tour::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\Hidden::make('operator_id')->default(auth()->user()->id)->required(),
                Forms\Components\TextInput::make('title')->required(),
                Forms\Components\Select::make('type_id')->relationship('type', 'name')->required(),
                Forms\Components\Textarea::make('description'),
                Forms\Components\TextInput::make('place'),
                Forms\Components\TextInput::make('accommodation'),
                Forms\Components\Select::make('packages')->multiple()->relationship('packages', 'name')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\ToggleColumn::make('active'),
                Tables\Columns\TextColumn::make('type_id.name'),
            ])
            ->filters([
                //
                Tables\Filters\Filter::make('active')
                    ->query(fn (Builder $query): Builder => $query->where('active', 1)),
                Tables\Filters\Filter::make('type_id')
                    ->query(fn (Builder $query): Builder => $query->where('active', 1)),
                    Tables\Filters\TrashedFilter::make(),
            
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ForceDeleteAction::make(),
                Tables\Actions\RestoreAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
                Tables\Actions\ForceDeleteBulkAction::make(),
                Tables\Actions\RestoreBulkAction::make(),   
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            RelationManagers\ImagesRelationManager::class,
            RelationManagers\SchedulesRelationManager::class,
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTours::route('/'),
            'create' => Pages\CreateTour::route('/create'),
            'edit' => Pages\EditTour::route('/{record}/edit'),
        ];
    }    
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }

}
