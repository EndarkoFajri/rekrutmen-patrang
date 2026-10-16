<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ApplicationResource\Pages;
use App\Models\Application;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\HtmlString;

class ApplicationResource extends Resource
{
    protected static ?string $model = Application::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
{
    return $form
        ->schema([
            Forms\Components\Select::make('job_id')
                ->relationship('job', 'title')
                ->label('Job')
                ->disabled(),

            Forms\Components\Select::make('user_id')
                ->relationship('user', 'name')
                ->label('User')
                ->disabled(),

            Forms\Components\Select::make('status')
                ->label('Status')
                ->options([
               'pending' => 'Seleksi Administrasi',
                'interview' => 'Tahap Wawancara',
                'accepted' => 'Diterima',
                'rejected' => 'Ditolak',
                ])
                ->required(),

            Forms\Components\Placeholder::make('attachments_list')
                ->label('Berkas Lampiran Pelamar')
                ->content(function ($record) {
                    if (!$record || empty($record->attachments)) {
                        return 'Tidak ada berkas yang diunggah.';
                    }

                    $html = '<div style="display: flex; flex-direction: column; gap: 10px;">';
                    foreach ($record->attachments as $label => $path) {
                        $docName = is_numeric($label) ? 'Dokumen' : $label;
                        $url = \Illuminate\Support\Facades\Storage::url($path);

                        $html .= '<div style="display: flex; justify-content: space-between; align-items: center; padding: 12px 16px; background-color: #ffffff; border: 1px solid #e5e7eb; border-radius: 8px; box-shadow: 0 1px 3px rgba(0,0,0,0.05);">';
                        $html .= '<span style="font-weight: 600; color: #1f2937; font-size: 14px;">' . e($docName) . '</span>';
                        $html .= '<a href="' . e($url) . '" target="_blank" style="display: inline-block; background-color: #2563eb; color: #ffffff; padding: 8px 16px; border-radius: 6px; font-size: 13px; font-weight: 600; text-decoration: none; transition: background-color 0.2s;">Lihat / Unduh Berkas &rarr;</a>';
                        $html .= '</div>';
                    }
                    $html .= '</div>';

                    return new \Illuminate\Support\HtmlString($html);
                })
                ->columnSpanFull(),
        ]);
}
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('job.title')->label('Lowongan'),
                Tables\Columns\TextColumn::make('user.name')->label('Nama Pelamar'),
                Tables\Columns\TextColumn::make('status')->label('Status'),
                Tables\Columns\TextColumn::make('created_at')->dateTime()->label('Tanggal Melamar'),
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
            'index' => Pages\ListApplications::route('/'),
            'create' => Pages\CreateApplication::route('/create'),
            'edit' => Pages\EditApplication::route('/{record}/edit'),
        ];
    }
}