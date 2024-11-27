<?php

namespace App\Filament\Resources;
use Filament\Tables\Table;
use App\Filament\Resources\OrderResource\Pages;
use App\Models\order;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Actions\Action;
use Filament\Notifications\Notification;
 // Make sure this is included

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationLabel = 'Orders';
    protected static ?string $navigationIcon = 'heroicon-o-home';

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
        ];
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
            TextColumn::make('user.name')->label('Utilisateur')->searchable(),
            TextColumn::make('date_debut')->label('dateDebut')->searchable(),
            TextColumn::make('date_fin')->label('dateFin')->searchable(),
            TextColumn::make('price_order')->label('pirce'),
            ])

            ->filters([
                // Add filters if needed
            ])
            ->headerActions([
                Action::make('Calculer Total')
                    ->label('Calculer le Total des Prix')
                    ->action(function () {
                        $total = Order::sum('price_order');
                        Notification::make()
                        ->title("Le total des prix est : $total")
                        ->success()
                        ->send();
                    })
                    ->color('success') // Couleur verte pour indiquer une action positive
                    ->icon('heroicon-o-calculator'), // Icône pour le bouton
            ]);
    }
}
