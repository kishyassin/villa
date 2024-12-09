<?php

namespace App\Filament\Resources;

use Filament\Tables\Table;
use App\Filament\Resources\CommentResource\Pages;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Actions\Action;
use App\Models\Comment;
use Filament\Forms;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;

class CommentResource extends Resource
{
    protected static ?string $model = Comment::class;

    protected static ?string $navigationLabel = 'Commentaires';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';


    public static function getPages(): array
    {
        return [
            'index' => Pages\ListComments::route('/'),
        ];
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            TextColumn::make('comment_text')->label('Commentaire'),
            TextColumn::make('user.name')->label('Utilisateur')->searchable(),
            BooleanColumn::make('is_accept_show')->label('Accepté')
                ->trueIcon('heroicon-o-check')
                ->falseIcon('heroicon-o-x-circle')
        ])
        ->actions([
            Action::make('accept')
                ->label('Accepter')
                ->action(function ($record) {
                    $record->update(['is_accept_show' => true]); // Accepter le commentaire
                })
                ->color('success'),

            Action::make('reject')
                ->label('Rejeter')
                ->action(function ($record) {
                    $record->delete(); // Rejeter le commentaire
                })
                ->color('danger')
        ]);
    }

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Textarea::make('comment_text')->label('Commentaire')->required(),
                Toggle::make('is_accept_show')
                    ->label('Accepter pour affichage')
                    ->default(false),  // Définit si le commentaire est accepté ou non
            ]);
    }
}
