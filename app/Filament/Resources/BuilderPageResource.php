<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BuilderPageResource\Pages;
use App\Filament\Resources\BuilderPageResource\RelationManagers;
use App\Models\BuilderPage;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Actions\Action;

class BuilderPageResource extends Resource
{
    protected static ?string $model = BuilderPage::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //title
            TextInput::make('id')->hidden(),

            FileUpload::make('screenshot')
                ->label('Image')
                ->image(),

            //brand
            TextInput::make('name'),

            //price
            Select::make('published')
            ->options([
                'draft' => 'Draft',
                'reviewing' => 'Reviewing',
                'published' => 'Published',
            ]),

            // //category
            TextInput::make('previewUrl'),
            // //description
            // RichEditor::make('screenshot'),

            DateTimePicker::make('createdDate'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //thumbnail

                ImageColumn::make('screenshot')
                ->label('Image'),

                //title
                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),

                //category
                TextColumn::make('published')
                    ->sortable()
                    ->searchable(),

                // //title
                TextColumn::make('previewUrl'),

                TextColumn::make('createdDate')
                     ->searchable()

                // //title


                // //brand
                // TextColumn::make('createdDate')
                //     ->searchable()
                //     ->sortable()
                //     ->alignLeft(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                //Tables\Actions\EditAction::make(),
                //Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                //Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageBuilderPages::route('/'),
        ];
    }
}
