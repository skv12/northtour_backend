<?php

namespace App\Filament\Resources\TourResource\RelationManagers;

use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SchedulesRelationManager extends RelationManager
{
    protected static string $relationship = 'schedules';

    //protected static ?string $recordTitleAttribute = 'tour_id';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Forms\Components\TextInput::make('tour_id')
                //     ->required()
                //     ->maxLength(255),
                Forms\Components\Toggle::make('is_plan')
                    ->required(),
                Forms\Components\DateTimePicker::make('startdate')
                    ->required(),
                Forms\Components\DateTimePicker::make('enddate')
                    ->required(),
                Forms\Components\TextInput::make('space_total')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('space_current')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('price')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //Tables\Columns\TextColumn::make('tour_id'),
                Tables\Columns\ToggleColumn::make('is_plan'),
                Tables\Columns\TextColumn::make('startdate')->dateTime(),
                Tables\Columns\TextColumn::make('enddate')->dateTime(),
                Tables\Columns\TextColumn::make('space_total'),
                Tables\Columns\TextColumn::make('space_current'),
                Tables\Columns\TextColumn::make('price'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }    
}
